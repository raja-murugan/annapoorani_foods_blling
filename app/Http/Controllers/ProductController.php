<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Session;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::where('soft_delete', '!=', 1)->get();
        $Productdata = [];
        foreach ($data as $key => $datas) {
            $Categoryid = Category::findOrFail($datas->category_id);
            $sessionid = Session::findOrFail($datas->session_id);

            $Productdata[] = array(
                'id' => $datas->id,
                'unique_key' => $datas->unique_key,
                'name' => $datas->name,
                'note' => $datas->note,
                'price' => $datas->price,
                'image' => $datas->image,
                'categoryname' => $Categoryid->name,
                'sessionname' => $sessionid->name,
                'session_id' => $datas->session_id,
                'category_id' => $datas->category_id,
            );
        }
        $session = Session::where('soft_delete', '!=', 1)->get();
        $category = Category::where('soft_delete', '!=', 1)->get();
        return view('page.backend.product.index', compact('Productdata', 'session', 'category'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Product();
        $random_no =  rand(100,999);

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->note = $request->get('note');
        $data->price = $request->get('price');
        $data->category_id = $request->get('category_id');
        $data->session_id = $request->get('session_id');

        
        if ($request->productimage != "") {
            $productimage = $request->productimage;
            $filename_one = $data->name . '_' . $random_no . '_' . '.' . $productimage->getClientOriginalExtension();
            $request->productimage->move('assets/product', $filename_one);
            $data->image = $filename_one;
        }

        $data->save();


        return redirect()->route('product.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $ProductData = Product::where('unique_key', '=', $unique_key)->first();

        $random_no =  rand(100,999);

        $ProductData->name = $request->get('name');
        $ProductData->note = $request->get('note');
        $ProductData->price = $request->get('price');
        $ProductData->category_id = $request->get('category_id');
        $ProductData->session_id = $request->get('session_id');


        if ($request->productimage != "") {
            $productimage = $request->productimage;
            $filename_one = $ProductData->name . '_' . $random_no . '_' . '.' . $productimage->getClientOriginalExtension();
            $request->productimage->move('assets/product', $filename_one);
            $ProductData->image = $filename_one;
        } else {
            $Insertedproof_image_one = $ProductData->image;
            $ProductData->image = $Insertedproof_image_one;
        }

        $ProductData->update();

        return redirect()->route('product.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = Product::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('product.index')->with('warning', 'Deleted !');
    }


    public function getcategories()
    {
        $productsession_id = request()->get('productsession_id');
        
        $GetCategory = Category::select('*')
                ->where('session_id', '=', $productsession_id)
                ->get();
            
        foreach ($GetCategory as $key => $GetCategories) {
            $output[] = array(
                'id' => $GetCategories->id,
                'name' => $GetCategories->name
            );
        }
        if (isset($output) & !empty($output)) {
            echo json_encode($output);
        }else{
            echo json_encode(
                array('status' => 'false')
            );
        }
    }


    public function checkduplicate(Request $request)
    {
        if(request()->get('query'))
        {
            $query = request()->get('query');
            $productsession_id = request()->get('productsession_id');
            $productcategory_id = request()->get('productcategory_id');

            $ProductData = Product::where('name', '=', $query)->where('session_id', '=', $productsession_id)->where('category_id', '=', $productcategory_id)->first();
            
            $userData['data'] = $ProductData;
            echo json_encode($userData);
        }
    }


    public function getselectedcat_products()
    {
        $catogry_id = request()->get('catogry_id');
        $output = [];

            $CategoryProducts = Product::where('category_id', '=', $catogry_id)->get();
            foreach ($CategoryProducts as $key => $CategoryProducts_arr) {
                $output[] = [
                    'productname' => $CategoryProducts_arr->name,
                    'product_image' => asset('assets/product/'.$CategoryProducts_arr->image),
                    'productprice' => $CategoryProducts_arr->price,
                    'id' => $CategoryProducts_arr->id,
                ];
            }
        
            echo json_encode($output);
    }

    
}
