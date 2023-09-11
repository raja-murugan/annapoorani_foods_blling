<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::where('soft_delete', '!=', 1)->get();
        return view('page.backend.supplier.index', compact('data'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Supplier();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->phone_number = $request->get('phone_number');
        $data->address = $request->get('address');
        $data->old_balance = $request->get('old_balance');

        $data->save();


        return redirect()->route('supplier.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $SupplierData = Supplier::where('unique_key', '=', $unique_key)->first();

        $SupplierData->name = $request->get('name');
        $SupplierData->phone_number = $request->get('phone_number');
        $SupplierData->address = $request->get('address');

        $SupplierData->update();

        return redirect()->route('supplier.index')->with('info', 'Updated !');
    }



    public function delete($unique_key)
    {
        $data = Supplier::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('supplier.index')->with('warning', 'Deleted !');
    }


    public function checkduplicate(Request $request)
    {
        if(request()->get('query'))
        {
            $query = request()->get('query');
            $SupplierData = Supplier::where('phone_number', '=', $query)->first();
            
            $userData['data'] = $SupplierData;
            echo json_encode($userData);
        }
    }
}
