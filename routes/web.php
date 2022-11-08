<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// category
Route::get('/category',[CategoryController::class,'index']);

// product
Route::get('/product',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'create']);


// inventory
Route::get('/inventory',[InventoryController::class,'index']);
Route::post('/inventory',[InventoryController::class,'create']);


// vendor 
Route::get('/vendor',[VendorController::class,'index']);


// Stock in
Route::get('/stock-in',[StockInController::class,'index']);
Route::get('/stock-in/create',[StockInController::class,'create']);
Route::get('/stock-in/record/{id}',[StockInController::class,'record']);
Route::post('/stock-in/crate',[StockInController::class,'index']);

// add stock item 
Route::post('/add-stock-in-item',[StockInController::class,'addItem']);



