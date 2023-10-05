<?php

namespace App\Http\Controllers;
use App\Models\Payoff;
use App\Models\Payoffdata;
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



    public function store(Request $request)
    {
        $date = $request->get('date');

        foreach ($request->get('amountgiven') as $key => $amount_given) {
            if($request->amountgiven[$key] != ""){
                
                $pdrandomkey = Str::random(5);
                $Payoffdata = new Payoffdata();
                $Payoffdata->unique_key = $pdrandomkey;
                $Payoffdata->date = $request->get('date');
                $Payoffdata->month = date('m', strtotime($request->get('date')));
                $Payoffdata->year = date('Y', strtotime($request->get('date')));
                $Payoffdata->employee_id = $request->employee_id[$key];
                $Payoffdata->payable_amount = $request->amountgiven[$key];
                $Payoffdata->save();

            }
        }




        foreach ($request->get('amountgiven') as $key => $amountgiven) {
            

                $randomkey = Str::random(5);

                $Payoff = new Payoff();
                $Payoff->unique_key = $randomkey;
                $Payoff->date = $request->get('date');
                $Payoff->month = date('m', strtotime($request->get('date')));
                $Payoff->year = date('Y', strtotime($request->get('date')));
                $Payoff->employee_id = $request->employee_id[$key];
                $Payoff->total_days = $request->totaldays[$key];
                $Payoff->present_days = $request->total_presentdays[$key];
                $Payoff->perdaysalary = $request->perdaysalary[$key];
                $Payoff->total_salaryamount = $request->total_salaryamount[$key];
                $Payoff->paid_salary = $request->amountgiven[$key];
    
                $tot_salary = $request->total_salaryamount[$key];
                $paid_salary = $request->amountgiven[$key];
    
                if($tot_salary == $paid_salary){
                    $Payoff->status = 'Paid';
                }else if($tot_salary < $paid_salary){
                    $Payoff->status = 'ExtraPaid';
                }else if($paid_salary == ''){
                    $Payoff->status = 'NotPaid';
                }else if($tot_salary > $paid_salary){
                    $Payoff->status = 'Lesspaid';
                }
                $Payoff->save();
            
        }


        

        return redirect()->route('payoff.index')->with('message', 'Data added successfully!');
            
    }
}
