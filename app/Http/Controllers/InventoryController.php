<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function index()
    {
        $product = Product::all();
        $inventory = Inventory::all();
        return view('admin.inventory.index',compact('product','inventory'));
    }

    function create(Request $request)
    {
        $inv = new Inventory();
        $inv->product_id = $request->product_id;
        $inv->type = $request->type;
        $inv->quantity = $request->quantity;
        $inv->save();

        $product  = Product::find($request->product_id);

        if($request->type == 1 )
        {
            $product->stock += $request->quantity;
            $product->update();
        }
        else{
            $product->stock -= $request->quantity;
            $product->update();
        }


        return back();
    }
}
