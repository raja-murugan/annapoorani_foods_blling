<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Session;
use App\Models\Category;
use App\Models\Bank;
use App\Models\Sale;
use App\Models\SaleProduct;

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
        $data = Sale::where('soft_delete', '!=', 1)->get();
        
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();
        return view('page.backend.sales.index', compact('data', 'session', 'category'));
    }


    public function create()
    {
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();
        $product = Product::where('soft_delete', '!=', 1)->get();
        $Bank = Bank::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');

        $Latest_Sale = Sale::latest('id')->first();
        if($Latest_Sale != ''){
            $latestbillno = $Latest_Sale->bill_no + 1;
        }else {
            $latestbillno = 1;
        }

        return view('page.backend.sales.create', compact('session', 'category', 'product', 'today', 'timenow', 'Bank', 'latestbillno'));
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
        $data->sub_total = $request->subtotal;
        $data->tax = $request->taxamount;
        $data->total = $request->totalamount;
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
        $total = $GetSale->total;

        return view('page.backend.sales.print', compact('output', 'billno', 'sales_type', 'date', 'total'));

    }



    



    
}
