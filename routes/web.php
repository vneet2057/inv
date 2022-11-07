<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
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



