<?php

namespace App\Http\Controllers;
use App\Models\Payoff;
use App\Models\Employee;
use App\Models\Empattendance;
use App\Models\Empattendancedata;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class Payoffcontroller extends Controller
{
    public function index()
    {
        $data = Payoff::where('soft_delete', '!=', 1)->get();
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        return view('page.backend.payoff.index', compact('data', 'employee', 'today', 'timenow'));
    }


    public function create()
    {
        
        $employee = Employee::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $maxDays=date('t');
        //$shiftatend = Empattendancedata::where('employee_id', '=', $employee_id)->first();
       
        return view('page.backend.payoff.create', compact('employee', 'today', 'timenow', 'maxDays'));
    }
}
