<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Purchase;
use App\Models\PurchaseProductdata;
use App\Models\Supplier;
use App\Models\Purchaseproduct;
use App\Models\Bank;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class PurchaseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Purchase::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $purchase_data = [];
        foreach ($data as $key => $datas) {
            $supplier_name = Supplier::findOrFail($datas->supplier_id);


            $PurchaseProducts = PurchaseProductdata::where('purchase_id', '=', $datas->id)->get();
            foreach ($PurchaseProducts as $key => $PurchaseProducts_arrdata) {

                $purchaseproduct_id = Purchaseproduct::findOrFail($PurchaseProducts_arrdata->purchaseproduct_id);
                $terms[] = array(
                    'product_name' => $purchaseproduct_id->name,
                    'quantity' => $PurchaseProducts_arrdata->quantity,
                    'price' => $PurchaseProducts_arrdata->price,
                    'total_price' => $PurchaseProducts_arrdata->total_price,
                    'purchase_id' => $PurchaseProducts_arrdata->purchase_id,

                );
            }



            $purchase_data[] = array(
                'unique_key' => $datas->unique_key,
                'bill_no' => $datas->bill_no,
                'voucher_no' => $datas->voucher_no,
                'date' => $datas->date,
                'time' => $datas->time,
                'supplier_id' => $datas->supplier_id,
                'supplier_name' => $supplier_name->name,
                'sub_total' => $datas->sub_total,
                'id' => $datas->id,
                'tax' => $datas->tax,
                'total' => $datas->total,
                'discount' => $datas->discount,
                'grandtotal' => $datas->grandtotal,
                'payment_method' => $datas->payment_method,
            );

        }


        $Purchaseproduct = Purchaseproduct::where('soft_delete', '!=', 1)->get();
        $Supplier = Supplier::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.purchase.index', compact('purchase_data', 'today', 'timenow', 'Purchaseproduct', 'Supplier', 'bank'));
    }



    public function create()
    {
        $purchaseproduct = Purchaseproduct::where('soft_delete', '!=', 1)->get();
        $Supplier = Supplier::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        return view('page.backend.purchase.create', compact('purchaseproduct', 'Supplier', 'bank', 'today', 'timenow'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);
    }



    public function edit($unique_key)
    {
        $PurchaseData = Purchase::where('unique_key', '=', $unique_key)->first();
        $purchaseproduct = Purchaseproduct::orderBy('name', 'ASC')->where('soft_delete', '!=', 1)->get();
        $Supplier = Supplier::where('soft_delete', '!=', 1)->get();
        $bank = Bank::where('soft_delete', '!=', 1)->get();
        $PurchaseProductdata = PurchaseProductdata::where('purchase_id', '=', $PurchaseData->id)->get();

        return view('page.backend.purchase.edit', compact('PurchaseData', 'purchaseproduct', 'Supplier', 'bank', 'PurchaseProductdata'));
    }


    public function update(Request $request, $unique_key)
    {

    }


    public function delete($unique_key)
    {
        
    }
}
