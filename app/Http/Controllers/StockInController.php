<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockItems;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    function index()
    {
        $stock_in = StockIn::all();
        return view('admin.stockin.index',compact('stock_in'));
    }


    function create()
    {
        $stock_in = new StockIn();
        $stock_in->date = date(now());
        $stock_in->save();
        return redirect('/stock-in/record/' . $stock_in->id);
    }


    function record($id)
    {
        $stock_in = StockIn::find($id);
        $vendor = Vendor::all();
        $product = Product::all();

        return view('admin.stockin.create', compact('stock_in', 'vendor', 'product'));
    }



    function addItem(Request $request)
    {

        $stock_in_item = new StockItems();
        $stock_in_item->product_id = $request->product_id;
        $stock_in_item->stock_in_id = $request->stock_in_id;
        $stock_in_item->rete = $request->rete;
        $stock_in_item->quantity = $request->quantity;
        $stock_in_item->total = $request->quantity * $request->rete;
        $stock_in_item->save();


        return response([
            'status' => 200
        ]);
    }


    function getItems($id)
    {
        $item = StockItems::where('stock_in_id', $id)->get();
        return response([
            'item' => $item
        ]);
    }

    function createBill(Request $request, $id)
    {
        try {
            $stock_in = StockIn::find($id);
            $stock_in->vendor_id = $request->vendor_id;
            $stock_in->vat_no = $request->vat_no;
            $stock_in->total_price = $request->total_price;
            $stock_in->paid_amount = $request->paid_amount;

            $check_pending_amount = $request->total_price - $request->paid_amount;

            $stock_in->pending_amount = $check_pending_amount;


            if ($stock_in->pending_amount <= 0) {
                $stock_in->status = 'paid';
            } else {
                $stock_in->status = 'payement-pending';
            }
            $stock_in->update();
            return response([
                'status' => 200,
            ]);
        } catch (Exception $exception) {
            return response([
                "status" => 400,
                "message" => 'errer' . $exception,
            ]);
        }
    }
}
