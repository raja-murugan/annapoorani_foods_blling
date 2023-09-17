<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::where('soft_delete', '!=', 1)->get();
        $session = Session::where('soft_delete', '!=', 1)->get();
        return view('page.backend.category.index', compact('data', 'session'));
    }

    public function store(Request $request)
    {
       
        $randomkey = Str::random(5);

        $Category = new Category;
        $Category->unique_key = $randomkey;
        $Category->name = $request->get('name');
        $Category->save();
        

        return redirect()->route('category.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $CategoryData = Category::where('unique_key', '=', $unique_key)->first();

        $CategoryData->name = $request->get('name');
        //$CategoryData->session_id = $request->get('session_id');
        $CategoryData->update();

        return redirect()->route('category.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = Category::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('category.index')->with('warning', 'Deleted !');
    }
}
