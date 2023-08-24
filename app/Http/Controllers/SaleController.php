<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Session;
use App\Models\Category;
use App\Models\Sale;

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
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');



        return view('page.backend.sales.create', compact('session', 'category', 'product', 'today', 'timenow'));
    }


    public function getselectedproducts()
    {
        $product_id = request()->get('productids');
        $output = [];
        foreach ($product_id as $key => $product_ids) {
            $Getproducts = Product::where('id', '=', $product_ids)->get();
            
            foreach ($Getproducts as $key => $Getproducts_arr) {
    
                $output[] = array(
                    'product_id' => $Getproducts_arr->id,
                    'product_name' => $Getproducts_arr->name,
                    'product_price' => $Getproducts_arr->price,
                    'product_image' => asset('assets/product/'.$Getproducts_arr->image)
                );
            }
            
        }
        echo json_encode($output);

        //$cart = session()->get('cart', []);
        //session()->put('cart', $output);
    }



    



    
}
