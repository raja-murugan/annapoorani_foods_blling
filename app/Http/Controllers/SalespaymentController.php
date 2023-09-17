<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\Customer;
use App\Models\Deliveryplan;
use App\Models\Salespayment;
use App\Models\Payment;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class SalespaymentController extends Controller
{
    public function index()
    {
        
        $today = Carbon::now()->format('Y-m-d');
        $data = Salespayment::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $salepayment_data = [];
        foreach ($data as $key => $datas) {

                $customer = Customer::findOrFail($datas->customer_id);
                if($datas->deliveryplan_id != ""){
                    $deliveryplan = Deliveryplan::findOrFail($datas->deliveryplan_id);
                    $delivery_plan = $deliveryplan->name;
                }else {
                    $delivery_plan = '';
                }
                

            $salepayment_data[] = array(
                'customer' => $customer->name,
                'customer_id' => $datas->customer_id,
                'date' => date('d-m-Y', strtotime($datas->date)),
                'time' => $datas->time,
                'paid_amount' => $datas->paid_amount,
                'deliveryplan_id' => $datas->deliveryplan_id,
                'deliveryplan' => $delivery_plan,
                'id' => $datas->id,
                'unique_key' => $datas->unique_key,
            );
        }
        
        $Customer = Customer::where('soft_delete', '!=', 1)->get();
        $deliveryplan = deliveryplan::where('soft_delete', '!=', 1)->get();

        $todaydate = Carbon::now()->format('d-m-Y');
        return view('page.backend.salespayment.index', compact('salepayment_data', 'Customer', 'deliveryplan', 'today', 'todaydate'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');
        $data = Salespayment::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $salepayment_data = [];
        foreach ($data as $key => $datas) {

                $customer = Customer::findOrFail($datas->customer_id);
                $deliveryplan = Deliveryplan::findOrFail($datas->deliveryplan_id);

            $salepayment_data[] = array(
                'customer' => $customer->name,
                'customer_id' => $datas->customer_id,
                'date' => date('d-m-Y', strtotime($datas->date)),
                'time' => $datas->time,
                'paid_amount' => $datas->paid_amount,
                'deliveryplan_id' => $datas->deliveryplan_id,
                'deliveryplan' => $deliveryplan->name,
                'id' => $datas->id,
                'unique_key' => $datas->unique_key,
            );
        }
        
        $Customer = Customer::where('soft_delete', '!=', 1)->get();
        $deliveryplan = deliveryplan::where('soft_delete', '!=', 1)->get();

        $todaydate = Carbon::now()->format('d-m-Y');
        return view('page.backend.salespayment.index', compact('salepayment_data', 'Customer', 'deliveryplan', 'today', 'todaydate'));
    }



    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Salespayment();

        $data->unique_key = $randomkey;
        $data->customer_id = $request->get('customer_id');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->paid_amount = $request->get('paid_amount');
        $data->deliveryplan_id = $request->get('deliveryplan_id');
        $data->save();

        $customerid = $request->get('customer_id');

        $saleamountData = Payment::where('customer_id', '=', $customerid)->first();

        if($saleamountData != ""){
            $old_grossamount = $saleamountData->saleamount;
            $old_paid = $saleamountData->salepaid;

            $paidamount = $request->get('paid_amount');

            $new_grossamount = $old_grossamount;
            $new_paid = $old_paid + $paidamount;
            $new_balance = $new_grossamount - $new_paid;

            DB::table('payments')->where('customer_id', $customerid)->update([
                'saleamount' => $new_grossamount,  'salepaid' => $new_paid, 'salebalance' => $new_balance
            ]);
        }

        return redirect()->route('salespayment.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $Salespayment = Salespayment::where('unique_key', '=', $unique_key)->first();

        $Salespayment->customer_id = $request->get('customer_id');
        $Salespayment->date = $request->get('date');
        $Salespayment->time = $request->get('time');
        $Salespayment->paid_amount = $request->get('paid_amount');
        $Salespayment->deliveryplan_id = $request->get('deliveryplan_id');
        $Salespayment->update();

        return redirect()->route('salespayment.index')->with('info', 'Updated !');
    }


    public function delete($unique_key)
    {
        $data = Salespayment::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('salespayment.index')->with('warning', 'Deleted !');
    }
}
