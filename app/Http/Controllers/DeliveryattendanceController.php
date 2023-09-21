<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Deliveryboy;
use App\Models\Deliveryattendance;
use App\Models\Deliveryattendancedata;
use App\Models\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;
class DeliveryattendanceController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $current_month = Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $data = Deliveryattendance::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $attendance_data = [];
        $terms = [];
        foreach ($data as $key => $datas) {

            $Deliveryattendancedata = Deliveryattendancedata::where('deliveryattendance_id', '=', $datas->id)->get();
            foreach ($Deliveryattendancedata as $key => $DeliveryattendancedataS) {
                

                $session = Session::findOrFail($DeliveryattendancedataS->session_id);

                $terms[] = array(
                    'session' => $session->name,
                    'attendance' => $DeliveryattendancedataS->attendance,
                    'deliveryattendance_id' => $DeliveryattendancedataS->deliveryattendance_id,
                    'id' => $DeliveryattendancedataS->id,
                );
            }

            

            $deliveryboy_id = Deliveryboy::findOrFail($datas->deliveryboy_id);
            $attendance_data[] = array(
                'unique_key' => $datas->unique_key,
                'date' => $datas->date,
                'time' => $datas->time,
                'id' => $datas->id,
                'deliveryboy_id' => $datas->deliveryboy_id,
                'deliveryboy' => $deliveryboy_id->name,
                'terms' => $terms,
            );

        }


        $Deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        $Current_month = Carbon::now()->format('M');
        return view('page.backend.delivery_attendance.index', compact('attendance_data', 'today', 'timenow', 'Deliveryboy', 'Current_month', 'current_year'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');

        $current_month = date('m', strtotime($today));
        $current_year = date('Y', strtotime($today));

        $Current_month = date('M', strtotime($today));


        $data = Deliveryattendance::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $attendance_data = [];
        $terms = [];
        foreach ($data as $key => $datas) {

            $Deliveryattendancedata = Deliveryattendancedata::where('deliveryattendance_id', '=', $datas->id)->get();
            foreach ($Deliveryattendancedata as $key => $DeliveryattendancedataS) {
                

                $session = Session::findOrFail($DeliveryattendancedataS->session_id);

                $terms[] = array(
                    'session' => $session->name,
                    'attendance' => $DeliveryattendancedataS->attendance,
                    'deliveryattendance_id' => $DeliveryattendancedataS->deliveryattendance_id,
                    'id' => $DeliveryattendancedataS->id,
                );
            }

            $present_data = Deliveryattendancedata::where('deliveryattendance_id', '=', $datas->id)->where('attendance', '=', 'Present')->get();
            $present_count = $present_data->count();

            $absent_data = Deliveryattendancedata::where('deliveryattendance_id', '=', $datas->id)->where('attendance', '=', 'Absent')->get();
            $absent_count = $absent_data->count();


            $deliveryboy_id = Deliveryboy::findOrFail($datas->deliveryboy_id);
            $attendance_data[] = array(
                'unique_key' => $datas->unique_key,
                'date' => $datas->date,
                'time' => $datas->time,
                'id' => $datas->id,
                'deliveryboy_id' => $datas->deliveryboy_id,
                'deliveryboy' => $deliveryboy_id->name,
                'terms' => $terms,
                'present_count' => $present_count,
                'absent_count' => $absent_count,
            );
        }


        $Deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.delivery_attendance.index', compact('attendance_data', 'today', 'timenow', 'Deliveryboy', 'Current_month', 'current_year'));
    }


    public function create()
    {
        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->get();
        $session = Session::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.delivery_attendance.create', compact('deliveryboy', 'today', 'timenow', 'session'));
    }



    public function store(Request $request)
    {
        $date = $request->get('date');
        $deliveryboy_id = $request->get('deliveryboy_id');
        $dateatend = Deliveryattendance::where('date', '=', $date)->where('deliveryboy_id', '=', $deliveryboy_id)->first();

        if($dateatend == ""){
            $randomkey = Str::random(5);

            $data = new Deliveryattendance();
            $data->unique_key = $randomkey;
            $data->date = $request->get('date');
            $data->time = $request->get('time');
            $data->month = date('m', strtotime($request->get('date')));
            $data->year = date('Y', strtotime($request->get('date')));
            $data->dateno = date('d', strtotime($request->get('date')));
            $data->deliveryboy_id = $request->get('deliveryboy_id');
            $data->save();
    
            $insertedId = $data->id;
    
    
            foreach ($request->get('session_id') as $key => $session_id) {
                $pprandomkey = Str::random(5);
    
                    $Deliveryattendancedata = new Deliveryattendancedata;
                    $Deliveryattendancedata->deliveryattendance_id = $insertedId;
                    $Deliveryattendancedata->session_id = $session_id;
                    $Deliveryattendancedata->sessionname = $request->sessionname[$key];
                    $Deliveryattendancedata->attendance = $request->attendance[$session_id];
                    $Deliveryattendancedata->save();
    
            }
    
    
            return redirect()->route('delivery_attendance.index')->with('message', 'Attendance Data added successfully!');
        }else {

            return redirect()->route('delivery_attendance.index')->with('warning', 'the delivery boy attendance already registered..Please edit!');
        }

        
    }

    public function edit($unique_key)
    {
        $Deliveryattendance = Deliveryattendance::where('unique_key', '=', $unique_key)->first();
        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->get();
        $session = Session::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $Deliveryattendancedata = Deliveryattendancedata::where('deliveryattendance_id', '=', $Deliveryattendance->id)->get();

        return view('page.backend.delivery_attendance.edit', compact('Deliveryattendance', 'deliveryboy', 'today', 'timenow', 'Deliveryattendancedata', 'session'));
    }


    public function update(Request $request, $unique_key)
    {
        $delivery_attendance = Deliveryattendance::where('unique_key', '=', $unique_key)->first();

        $delivery_attendance->date = $request->get('date');
        $delivery_attendance->time = $request->get('time');
        $delivery_attendance->month = date('m', strtotime($request->get('date')));
        $delivery_attendance->year = date('Y', strtotime($request->get('date')));
        $delivery_attendance->dateno = date('d', strtotime($request->get('date')));
        $delivery_attendance->deliveryboy_id = $request->get('deliveryboy_id');
        $delivery_attendance->update();

        $attendance_id = $delivery_attendance->id;


        foreach ($request->get('session_id') as $key => $session_id) {
                
                $attendanceid = $attendance_id;
                $attendance = $request->attendance[$session_id];

                DB::table('deliveryattendancedatas')->where('deliveryattendance_id', $attendanceid)->where('session_id', $session_id)->update([
                    'attendance' => $attendance
                ]);
        }


        return redirect()->route('delivery_attendance.index')->with('info', 'Updated !');


    }



}
