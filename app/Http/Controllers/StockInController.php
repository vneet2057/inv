<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockItems;
use App\Models\Vendor;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    function index()
    {
        return view('admin.stockin.index');
    }


    function create()
    {
        $stock_in = new StockIn();
        $stock_in->date = date(now());
        $stock_in->save();
        return redirect('/stock-in/record/'.$stock_in->id);
    }


    function record($id)
    {
        $stock_in = StockIn::find($id);
        $vendor = Vendor::all();
        $product = Product::all();
        $item = StockItems::where('stock_in_id',$id)->get();
        return view('admin.stockin.create',compact('stock_in','vendor','product','item'));
    }

    function addItem(Request $request)
    {
        $stock_in_item = new StockItems();
        $stock_in_item->product_id = $request->product_id;
        $stock_in_item->stock_in_id = $request->stock_in_id;
        $stock_in_item->rete = $request->rate;
        $stock_in_item->quantity = $request->quantity;
        $stock_in_item->total = $request->quantity * $request->rate;
        $stock_in_item->save();


        return redirect('/stock-in/record/'.$request->stock_in_id);

    }
}
