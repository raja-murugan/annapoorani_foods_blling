<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;
use App\Models\Empattendance;
use App\Models\Empattendancedata;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class EmpattendanceController extends Controller
{
    
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $time = strtotime($today);
        $curent_month = date("F",$time);


        $month = date("m",strtotime($today));
        $year = date("Y",strtotime($today));

        $list=array();
        $monthdates = [];
        for($d=1; $d<=31; $d++)
        {
            $times = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $times) == $month)
                $list[] = date('d', $times);
                $monthdates[] = date('Y-m-d', $times);
        }
        $attendence_Data = [];

        $shift_arr = array(1,2);


        foreach (($monthdates) as $key => $monthdate_arr) {
                foreach (($shift_arr) as $key => $shift_arrays) {
                $employees = Employee::where('soft_delete', '!=', 1)->get();
                foreach ($employees as $key => $employees_arr) {

                    $status = '';
                    $attendencedata = Empattendancedata::where('employee_id', '=', $employees_arr->id)->where('date', '=', $monthdate_arr)->where('shift', '=', $shift_arrays)->first();
                    if($attendencedata != ""){
                        if($attendencedata->attendance == 'Present'){
                            $status = 'P';
                        }else if($attendencedata->attendance == 'Absent'){
                            $status = 'A';
                        }else if($attendencedata->attendance == 'Leave'){
                            $status = 'L';
                        }else if($attendencedata->attendance == 'Sick Leave'){
                            $status = 'SL';
                        }
                        $attendence_id = $attendencedata->id;
                    }else {
                        $attendence_id = 0;
                    }



                    $attendence_Data[] = array(
                        'employee' => $employees_arr->name,
                        'empid' => $employees_arr->id,
                        'empname' => $employees_arr->name,
                        'attendence_status' => $status,
                        'date' => date("d",strtotime($monthdate_arr)),
                        'attendence_id' => $attendence_id
                    );
                }
            }
        }


        $data = Employee::where('soft_delete', '!=', 1)->get();
        $Employee = Employee::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.index', compact('attendence_Data', 'today', 'timenow', 'Employee', 'curent_month', 'list', 'monthdates', 'data', 'year', 'shift_arr'));
    }



    public function datefilter(Request $request) {
        $today = $request->get('from_date');

        $time = strtotime($today);
        $curent_month = date("F",$time);


        $month = date("m",strtotime($today));
        $year = date("Y",strtotime($today));

        $list=array();
        $monthdates = [];
        for($d=1; $d<=31; $d++)
        {
            $times = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $times) == $month)
                $list[] = date('d', $times);
                $monthdates[] = date('Y-m-d', $times);
        }

        $attendence_Data = [];

        foreach (($monthdates) as $key => $monthdate_arr) {
            $employees = Employee::where('soft_delete', '!=', 1)->get();
            foreach ($employees as $key => $employees_arr) {

                $status = '';
                $attendencedata = Empattendancedata::where('employee_id', '=', $employees_arr->id)->where('date', '=', $monthdate_arr)->first();
                if($attendencedata != ""){
                    if($attendencedata->attendance == 'Present'){
                        $status = 'P';
                    }else if($attendencedata->attendance == 'Absent'){
                        $status = 'A';
                    }else if($attendencedata->attendance == 'Leave'){
                        $status = 'L';
                    }else if($attendencedata->attendance == 'Sick Leave'){
                        $status = 'SL';
                    }
                    $attendence_id = $attendencedata->id;
                }else {
                    $attendence_id = 0;
                }



                $attendence_Data[] = array(
                    'employee' => $employees_arr->name,
                    'empid' => $employees_arr->id,
                    'empname' => $employees_arr->name,
                    'attendence_status' => $status,
                    'date' => date("d",strtotime($monthdate_arr)),
                    'attendence_id' => $attendence_id
                );
            }
        }


        $data = Employee::where('soft_delete', '!=', 1)->get();
        $Employee = Employee::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.index', compact('attendence_Data', 'today', 'timenow', 'Employee', 'curent_month', 'list', 'monthdates', 'data', 'year'));
    }


    public function shiftonecreate()
    {
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.shiftonecreate', compact('employee', 'today', 'timenow'));
    }


    public function shifttwocreate()
    {
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.emp_attendance.shifttwocreate', compact('employee', 'today', 'timenow'));
    }



    public function store(Request $request)
    {
        $date = $request->get('date');
        $shift = $request->get('shift');
        $dateatend = Empattendance::where('date', '=', $date)->where('shift', '=', $shift)->first();

        if($dateatend == ""){
            $randomkey = Str::random(5);

            $data = new Empattendance();
            $data->unique_key = $randomkey;
            $data->date = $request->get('date');
            $data->time = $request->get('time');
            $data->month = date('m', strtotime($request->get('date')));
            $data->year = date('Y', strtotime($request->get('date')));
            $data->dateno = date('d', strtotime($request->get('date')));
            $data->shift = $request->get('shift');
            $data->save();
    
            $insertedId = $data->id;
    
            error_reporting(0);
            foreach ($request->get('employee_id') as $key => $employee_id) {

                $shiftatend = Empattendancedata::where('date', '=', $date)->where('employee_id', '=', $employee_id)->first();
                if($shiftatend == ""){
                    if($request->attendance[$employee_id] != ""){
                        $pprandomkey = Str::random(5);
        
                        $EmployeeattendanceData = new Empattendancedata;
                        $EmployeeattendanceData->employeeattendance_id = $insertedId;
                        $EmployeeattendanceData->employee_id = $employee_id;
                        $EmployeeattendanceData->employee_name = $request->employee_name[$key];
                        $EmployeeattendanceData->attendance = $request->attendance[$employee_id];
                        $EmployeeattendanceData->date = $request->get('date');
                        $EmployeeattendanceData->shift = $request->get('shift');
                        $EmployeeattendanceData->save();
                    }
                }
                
                
               
    
            }
    
    
            return redirect()->route('emp_attendance.index')->with('message', 'Attendance Data added successfully!');
        }else {
            return redirect()->route('emp_attendance.index')->with('warning', 'Already Existed. Please you can Change Data !');
        }

        
    }


    public function edit($date, $shift)
    {
        $EmployeeAttendance = Empattendance::where('date', '=', $date)->where('shift', '=', $shift)->first();

        if($EmployeeAttendance != ""){
            $EmployeeattendanceData = Empattendancedata::where('employeeattendance_id', '=', $EmployeeAttendance->id)->get();

            $employee = Employee::where('soft_delete', '!=', 1)->get();
            $today = $date;
            $timenow = Carbon::now()->format('H:i');
        

            return view('page.backend.emp_attendance.edit', compact('EmployeeAttendance', 'employee', 'today', 'timenow', 'EmployeeattendanceData', 'shift'));
        }else {
            if($shift == 1){

                $employee = Employee::where('soft_delete', '!=', 1)->get();
                $today = $date;
                $timenow = Carbon::now()->format('H:i');

                return view('page.backend.emp_attendance.shiftonecreate', compact('employee', 'today', 'timenow'));

            }else if($shift == 2){

                $employee = Employee::where('soft_delete', '!=', 1)->get();
                $today = $date;
                $timenow = Carbon::now()->format('H:i');

                return view('page.backend.emp_attendance.shifttwocreate', compact('employee', 'today', 'timenow'));

            }
        }
        
    }




    public function update(Request $request, $unique_key)
    {
        $Employee_attendance = Empattendance::where('unique_key', '=', $unique_key)->first();

        $Employee_attendance->date = $request->get('date');
        $Employee_attendance->time = $request->get('time');
        $Employee_attendance->month = date('m', strtotime($request->get('date')));
        $Employee_attendance->year = date('Y', strtotime($request->get('date')));
        $Employee_attendance->dateno = date('d', strtotime($request->get('date')));
        $Employee_attendance->update();

        $attendance_id = $Employee_attendance->id;


        foreach ($request->get('employee_id') as $key => $employee_id) {
                
                $attendanceid = $attendance_id;
                $attendance = $request->attendance[$employee_id];

                DB::table('empattendancedatas')->where('employeeattendance_id', $attendanceid)->where('employee_id', $employee_id)->update([
                    'attendance' => $attendance
                ]);
        }


        return redirect()->route('emp_attendance.index')->with('info', 'Updated !');


    }



}
