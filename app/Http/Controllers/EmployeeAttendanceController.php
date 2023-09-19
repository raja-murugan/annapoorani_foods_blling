<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeattendanceData;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class EmployeeAttendanceController extends Controller
{
    
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = EmployeeAttendance::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $attendance_data = [];
        $terms = [];
        foreach ($data as $key => $datas) {

            $EmployeeattendanceData = EmployeeattendanceData::where('employeeattendance_id', '=', $datas->id)->get();
            foreach ($EmployeeattendanceData as $key => $EmployeeattendanceDatas) {

                $employee_name = Employee::findOrFail($EmployeeattendanceDatas->employee_id);
                $terms[] = array(
                    'employee_name' => $employee_name->name,
                    'employee_id' => $EmployeeattendanceDatas->employee_id,
                    'attendance' => $EmployeeattendanceDatas->attendance,
                    'employeeattendance_id' => $EmployeeattendanceDatas->employeeattendance_id,
                    'id' => $EmployeeattendanceDatas->id,
                );
            }


            $attendance_data[] = array(
                'unique_key' => $datas->unique_key,
                'date' => $datas->date,
                'time' => $datas->time,
                'id' => $datas->id,
                'terms' => $terms,
            );

        }


        $Employee = Employee::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.index', compact('attendance_data', 'today', 'timenow', 'Employee'));
    }



    public function datefilter(Request $request) {
        $today = $request->get('from_date');

        $data = EmployeeAttendance::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $attendance_data = [];
        $terms = [];
        foreach ($data as $key => $datas) {

            $EmployeeattendanceData = EmployeeattendanceData::where('employeeattendance_id', '=', $datas->id)->get();
            foreach ($EmployeeattendanceData as $key => $EmployeeattendanceDatas) {

                $employee_name = Employee::findOrFail($EmployeeattendanceDatas->employee_id);
                $terms[] = array(
                    'employee_name' => $employee_name->name,
                    'employee_id' => $EmployeeattendanceDatas->employee_id,
                    'attendance' => $EmployeeattendanceDatas->attendance,
                    'employeeattendance_id' => $EmployeeattendanceDatas->employeeattendance_id,
                    'id' => $EmployeeattendanceDatas->id,
                );
            }


            $attendance_data[] = array(
                'unique_key' => $datas->unique_key,
                'date' => $datas->date,
                'time' => $datas->time,
                'id' => $datas->id,
                'terms' => $terms,
            );

        }


        $Employee = Employee::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.index', compact('attendance_data', 'today', 'timenow', 'Employee'));
    }


    public function create()
    {
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.create', compact('employee', 'today', 'timenow'));
    }



    public function store(Request $request)
    {
        $date = $request->get('date');
        $dateatend = EmployeeAttendance::where('date', '=', $date)->first();

        if($dateatend == ""){
            $randomkey = Str::random(5);

            $data = new EmployeeAttendance();
            $data->unique_key = $randomkey;
            $data->date = $request->get('date');
            $data->time = $request->get('time');
            $data->save();
    
            $insertedId = $data->id;
    
    
            foreach ($request->get('employee_id') as $key => $employee_id) {
                $pprandomkey = Str::random(5);
    
                    $EmployeeattendanceData = new EmployeeattendanceData;
                    $EmployeeattendanceData->employeeattendance_id = $insertedId;
                    $EmployeeattendanceData->employee_id = $employee_id;
                    $EmployeeattendanceData->employee_name = $request->employee_name[$key];
                    $EmployeeattendanceData->attendance = $request->attendance[$employee_id];
                    $EmployeeattendanceData->save();
    
            }
    
    
            return redirect()->route('emp_attendance.index')->with('message', 'Attendance Data added successfully!');
        }else {
            return redirect()->route('emp_attendance.index')->with('warning', 'Already Existed. Please you can Change Data !');
        }

        
    }


    public function edit($unique_key)
    {
        $EmployeeAttendance = EmployeeAttendance::where('unique_key', '=', $unique_key)->first();
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $EmployeeattendanceData = EmployeeattendanceData::where('employeeattendance_id', '=', $EmployeeAttendance->id)->get();

        return view('page.backend.emp_attendance.edit', compact('EmployeeAttendance', 'employee', 'today', 'timenow', 'EmployeeattendanceData'));
    }




    public function update(Request $request, $unique_key)
    {
        $Employee_attendance = EmployeeAttendance::where('unique_key', '=', $unique_key)->first();

        $Employee_attendance->date = $request->get('date');
        $Employee_attendance->time = $request->get('time');
        $Employee_attendance->update();

        $attendance_id = $Employee_attendance->id;


        foreach ($request->get('employee_id') as $key => $employee_id) {
                
                $attendanceid = $attendance_id;
                $attendance = $request->attendance[$employee_id];

                DB::table('employeeattendance_data')->where('employeeattendance_id', $attendanceid)->where('employee_id', $employee_id)->update([
                    'attendance' => $attendance
                ]);
        }


        return redirect()->route('emp_attendance.index')->with('info', 'Updated !');


    }



}
