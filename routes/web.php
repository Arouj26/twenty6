<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WomenController;
use App\Http\Controllers\AdminController;
use App\Http\Models\ProductCategory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class,'index'] );
Route::get('/women',[WomenController::class,'women'] );
Route::get('/admin',[AdminController::class,'admin'] );
// Add products Route
Route::get('/admin/add_products',[AdminController::class,'add_products'] );
Route::post('/admin/add_products',[AdminController::class,'ret_products'] );

