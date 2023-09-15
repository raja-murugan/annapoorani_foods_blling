<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Session;
use App\Models\Category;
use App\Models\Bank;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\Customer;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;


class SaleController extends Controller
{
    public function index()
    {
        
        $today = Carbon::now()->format('Y-m-d');
        $data = Sale::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $sale_data = [];
        foreach ($data as $key => $datas) {
            
            if($datas->customer_id != ""){
                $customer = Customer::findOrFail($datas->customer_id);
                $customername = $customer->name;
            }else {
                $customername = '';
            }

            $sale_data[] = array(
                'date' => date('d-m-Y', strtotime($datas->date)),
                'bill_no' => $datas->bill_no,
                'time' => $datas->time,
                'sales_type' => $datas->sales_type,
                'customer_type' => $datas->customer_type,
                'customer' => $customername,
                'sub_total' => $datas->sub_total,
                'tax' => $datas->tax,
                'total' => $datas->total,
                'sale_discount' => $datas->sale_discount,
                'grandtotal' => $datas->grandtotal,
                'payment_method' => $datas->payment_method,
                'id' => $datas->id,
                'unique_key' => $datas->unique_key,
            );
        }
        
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();

        $todaydate = Carbon::now()->format('d-m-Y');
        return view('page.backend.sales.index', compact('sale_data', 'session', 'category', 'today', 'todaydate'));
    }


    public function datefilter(Request $request) {
        $today = $request->get('from_date');
        $sales_type = $request->get('sales_type');

        
            if($today){
                $data = Sale::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
                $sale_data = [];
                foreach ($data as $key => $datas) {
                    
                    if($datas->customer_id != ""){
                        $customer = Customer::findOrFail($datas->customer_id);
                        $customername = $customer->name;
                    }else {
                        $customername = '';
                    }

                    $sale_data[] = array(
                        'date' => date('d-m-Y', strtotime($datas->date)),
                        'bill_no' => $datas->bill_no,
                        'time' => $datas->time,
                        'sales_type' => $datas->sales_type,
                        'customer_type' => $datas->customer_type,
                        'customer' => $customername,
                        'sub_total' => $datas->sub_total,
                        'tax' => $datas->tax,
                        'total' => $datas->total,
                        'sale_discount' => $datas->sale_discount,
                        'grandtotal' => $datas->grandtotal,
                        'payment_method' => $datas->payment_method,
                        'id' => $datas->id,
                        'unique_key' => $datas->unique_key,
                    );
                }
            }


            if($sales_type){
                if($sales_type == 'Dine In'){
                    $data = Sale::where('sales_type', '=', 'Dine In')->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }else if($sales_type == 'Take Away'){
                    $data = Sale::where('sales_type', '=', 'Take Away')->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }else if($sales_type == 'Delivery'){
                    $data = Sale::where('sales_type', '=', 'Delivery')->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }
            }



            if($today && $sales_type){
                if($sales_type == 'Dine In'){
                    $data = Sale::where('sales_type', '=', 'Dine In')->where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }else if($sales_type == 'Take Away'){
                    $data = Sale::where('sales_type', '=', 'Take Away')->where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }else if($sales_type == 'Delivery'){
                    $data = Sale::where('sales_type', '=', 'Delivery')->where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
                    $sale_data = [];
                    foreach ($data as $key => $datas) {
                        
                        if($datas->customer_id != ""){
                            $customer = Customer::findOrFail($datas->customer_id);
                            $customername = $customer->name;
                        }else {
                            $customername = '';
                        }
    
                        $sale_data[] = array(
                            'date' => date('d-m-Y', strtotime($datas->date)),
                            'bill_no' => $datas->bill_no,
                            'time' => $datas->time,
                            'sales_type' => $datas->sales_type,
                            'customer_type' => $datas->customer_type,
                            'customer' => $customername,
                            'sub_total' => $datas->sub_total,
                            'tax' => $datas->tax,
                            'total' => $datas->total,
                            'sale_discount' => $datas->sale_discount,
                            'grandtotal' => $datas->grandtotal,
                            'payment_method' => $datas->payment_method,
                            'id' => $datas->id,
                            'unique_key' => $datas->unique_key,
                        );
                    }
                }
            }
        

        
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();
        $todaydate = Carbon::now()->format('d-m-Y');
        return view('page.backend.sales.index', compact('sale_data', 'session', 'category', 'today', 'todaydate'));
    }


    public function create()
    {
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();
        $product_array = Product::where('soft_delete', '!=', 1)->get();
        $Bank = Bank::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $customer_rray = Customer::where('soft_delete', '!=', 1)->get();

        $Latest_Sale = Sale::latest('id')->first();
        if($Latest_Sale != ''){
            $latestbillno = $Latest_Sale->bill_no + 1;
        }else {
            $latestbillno = 1;
        }

        $DineIn = Sale::where('sales_type', '=', 'Dine In')->where('soft_delete', '!=', 1)->latest()->take(10)->get();
        $DineInoutput = [];
        foreach ($DineIn as $key => $DineIn_arr) {

            $DineInoutput[] = array(
                'date' => date('d-m-Y', strtotime($DineIn_arr->date)),
                'bill_no' => $DineIn_arr->bill_no,
                'grandtotal' => $DineIn_arr->grandtotal,
                'unique_key' => $DineIn_arr->unique_key
            );
        }

        $TakeAway = Sale::where('sales_type', '=', 'Take Away')->where('soft_delete', '!=', 1)->latest()->take(10)->get();
        $TakeAwayInoutput = [];
        foreach ($TakeAway as $key => $TakeAway_arr) {

            $TakeAwayInoutput[] = array(
                'date' => date('d-m-Y', strtotime($TakeAway_arr->date)),
                'bill_no' => $TakeAway_arr->bill_no,
                'grandtotal' => $TakeAway_arr->grandtotal,
                'unique_key' => $TakeAway_arr->unique_key
            );
        }



        $Delivery = Sale::where('sales_type', '=', 'Delivery')->where('soft_delete', '!=', 1)->latest()->take(10)->get();
        $DeliveryInoutput = [];
        foreach ($Delivery as $key => $Delivery_arr) {

            $customer = Customer::findOrFail($Delivery_arr->customer_id);

            $DeliveryInoutput[] = array(
                'date' => date('d-m-Y', strtotime($Delivery_arr->date)),
                'bill_no' => $Delivery_arr->bill_no,
                'grandtotal' => $Delivery_arr->grandtotal,
                'customer' => $customer->name,
                'unique_key' => $Delivery_arr->unique_key
            );
        }


        return view('page.backend.sales.create', compact('session', 'category', 'product_array', 'today', 'timenow', 'Bank', 'latestbillno', 'customer_rray', 'DineInoutput', 'TakeAwayInoutput', 'DeliveryInoutput'));
    }


    public function getselectedproducts()
    {
        $product_id = request()->get('selectproductid');
        $output = [];
        
            $Getproducts = Product::findOrFail($product_id);

            $Category = Category::findOrFail($Getproducts->category_id);
                $output[] = [
                    "quantity" => 1,
                    'product_id' => $Getproducts->id,
                    'product_name' => $Getproducts->name,
                    'product_price' => $Getproducts->price,
                    'product_image' => asset('assets/product/'.$Getproducts->image),
                    'Category' => $Category->name,
                ];
            
        
            echo json_encode($output);
    }

    public function storeSalesData(Request $request)
    {
        $randomkey = Str::random(5);


        $data = new Sale;
        $data->unique_key = $randomkey;
        $data->bill_no = $request->billno;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->sales_type = $request->sales_type;
        $data->customer_type = $request->customer_type;
        $data->customer_id = $request->customer_id;
        $data->sub_total = $request->subtotal;
        $data->tax = $request->taxamount;
        $data->total = $request->totalamount;
        $data->sale_discount = $request->sale_discount;
        $data->grandtotal = $request->grandtotal;
        $data->payment_method = $request->paymentmethod;
        $data->save();


        $sales_id = $data->id;

        foreach (($request->product_ids) as $key => $product_id) {
            $SaleProduct = new SaleProduct;
            $SaleProduct->sales_id = $sales_id;
            $SaleProduct->product_id = $product_id;
            $SaleProduct->quantity = $request->product_quantity[$key];
            $SaleProduct->price = $request->product_price[$key];
            $SaleProduct->total_price = $request->total_price[$key];
            $SaleProduct->save();
        }


        $sales_type = $request->sales_type;
        if($sales_type == 'Delivery'){

            $customerid = $request->customer_id;

            $saleamountData = Payment::where('customer_id', '=', $customerid)->first();
            if($saleamountData != ""){

                $old_grossamount = $saleamountData->saleamount;

                $gross_amount = $request->grandtotal;

                $new_grossamount = $old_grossamount + $gross_amount;

                DB::table('payments')->where('customer_id', $customerid)->update([
                    'saleamount' => $new_grossamount
                ]);

            }else {
                $gross_amount = $request->grandtotal;

                $Paymentata = new Payment();

                $Paymentata->customer_id = $customerid;
                $Paymentata->saleamount = $request->grandtotal;
                $Paymentata->salepaid = 0;
                $Paymentata->salebalance = $request->grandtotal;
                $Paymentata->save();
            }
            //dd($customerid);

        }
        
            $next_billno = $data->bill_no + 1;
            return response()->json(['next_billno' => $next_billno, 'msg' => 'Bill Added', 'last_id' => $sales_id]);
        //$SaleData->save();

        //return redirect('form')->with('status', 'Ajax Form Data Has Been validated and store into database');

    }

    public function delete($unique_key)
    {
        $data = Sale::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('sales.index')->with('warning', 'Deleted !');
    }


    public function getLastId($last_salesid)
    {
        $GetSale = Sale::findOrFail($last_salesid);
        $output = [];
        $SaleProducts = SaleProduct::where('sales_id', '=', $GetSale->id)->get();
        foreach ($SaleProducts as $key => $SaleProducts_arr) {

            $Getproducts = Product::findOrFail($SaleProducts_arr->product_id);

            $output[] = array(
                'payment_method' => $GetSale->payment_method,
                'productname' => $Getproducts->name,
                'quantity' => $SaleProducts_arr->quantity,
                'price' => $SaleProducts_arr->price,
                'total_price' => $SaleProducts_arr->total_price,

            );
        }

        $billno = $GetSale->bill_no;
        $sales_type = $GetSale->sales_type;
        $date = $GetSale->date;
        $total = $GetSale->grandtotal;

        return view('page.backend.sales.print', compact('output', 'billno', 'sales_type', 'date', 'total'));

    }



    
    public function autocomplete(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $product_catid = $request->get('product_catid');
            $data = Product::select ("id", "name", "category_id", "session_id")
                    ->where('name', 'LIKE', "%{$query}%")->where('category_id', '=', $product_catid)->distinct()->get();
            $output = '<ul class="form-control" style="display:block; position:relative;background: #9ddbdb2e;">';
            foreach(($data) as $row)
            {
                $session = session::findOrFail($row->session_id);
                $Category = Category::findOrFail($row->category_id);
                $output .= '<li class="autosearchli"><a class="" style="color:black;background: #f8f9fa;">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }



    public function GetAutosearchProducts()
    {
        $sessionid = request()->get('sessionid');
        $productoutput = [];
        //$productids = [];
        //$prdoct_array = [];
        
            $Getproducts = Product::where('session_id', '=', $sessionid)->get();
            foreach ($Getproducts as $key => $Getproducts_arr) {

                $Category = Category::findOrFail($Getproducts_arr->category_id);
                $productoutput[] = [
                    'product_id' => $Getproducts_arr->id,
                    'product_name' => $Getproducts_arr->name,
                    'product_price' => $Getproducts_arr->price,
                    'product_image' => asset('assets/product/'.$Getproducts_arr->image),
                    'Category' => $Category->name,
                ];
            
            }

            
            //$prdoct_array =  array_replace_recursive($productids, $productoutput);
            echo json_encode($productoutput);
    }
    
}
