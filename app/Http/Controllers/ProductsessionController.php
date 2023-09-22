<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Session;
use App\Models\Category;
use App\Models\Productsession;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class ProductsessionController extends Controller
{
    public function index()
    {
        $data = Productsession::where('soft_delete', '!=', 1)->orderBy('id', 'DESC')->get();
        $Productdata = [];
        foreach ($data as $key => $datas) {

            $Productdata[] = array(
                'id' => $datas->id,
                'product_id' => $datas->product_id,
                'session_id' => $datas->session_id,
                'sessionname' => $datas->sessionname,
                'category_id' => $datas->category_id,
                'category_name' => $datas->category_name,
                'productname' => $datas->productname,
                'productimage' => $datas->productimage,
                'productprice' => $datas->productprice,
            );
        }
        $session = Session::where('soft_delete', '!=', 1)->get();
        $Product = Product::where('soft_delete', '!=', 1)->get();
        return view('page.backend.productsession.index', compact('Productdata', 'session', 'Product'));
    }


    public function store(Request $request)
    {

        if($request->get('session_ids') != ""){

            foreach ($request->get('session_ids') as $key => $session_ids) {
                
                $olddata = Productsession::where('session_id', '=', $session_ids)->where('product_id', '=', $request->get('product_id'))->first();
                if($olddata == ""){

                    $session = Session::findOrFail($session_ids);
                    $product = Product::findOrFail($request->get('product_id'));
                    $category = Category::findOrFail($product->category_id);


                    $Productsession = new Productsession;
                    $Productsession->product_id = $request->get('product_id');
                    $Productsession->session_id = $session_ids;
                    $Productsession->sessionname = $session->name;
                    $Productsession->category_id = $product->category_id;
                    $Productsession->category_name = $category->name;
                    $Productsession->productname = $product->name;
                    $Productsession->productimage = $product->image;
                    $Productsession->productprice = $product->price;
                    $Productsession->save();
                }
    
    
            }

            return redirect()->route('productsession.index')->with('message', 'Added !');

        }
        

       
    }


    public function edit(Request $request, $id)
    {

        $olddata = Productsession::where('session_id', '=', $request->get('session_id'))->where('product_id', '=', $request->get('product_id'))->first();
        if($olddata == ""){
            $ProductData = Productsession::findOrFail($id);

            $session = Session::findOrFail($request->get('session_id'));
            $product = Product::findOrFail($request->get('product_id'));
            $category = Category::findOrFail($product->category_id);
    
            $ProductData->product_id = $request->get('product_id');
            $ProductData->session_id = $request->get('session_id');
            $ProductData->sessionname = $session->name;
            $ProductData->category_id = $product->category_id;
            $ProductData->category_name = $category->name;
            $ProductData->productname = $product->name;
            $ProductData->productimage = $product->image;
            $ProductData->productprice = $product->price;
            $ProductData->update();
    
            return redirect()->route('productsession.index')->with('info', 'Updated !');
        }else {
            return redirect()->route('productsession.index')->with('warning', 'Already Existed !');
        }

        
    }



    public function delete($id)
    {
        $data = Productsession::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('productsession.index')->with('warning', 'Deleted !');
    }
}
