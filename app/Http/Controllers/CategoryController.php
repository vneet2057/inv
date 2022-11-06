<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
}
