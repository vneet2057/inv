<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function index()
    {
        $category = Category::all();
        return view('admin.product.index',compact('category'));
    }

     function create(Request $request)
     {
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->selling_price = $request->selling_price;
        $product->cost_price = $request->cost_price;
        $product->unit = $request->unit;
        $product->category_id = $request->category_id;
        $product->save();

        return back();
     }
}
