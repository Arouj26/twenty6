<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
//***************************Front end routes***************************************************** */
Route::get('/',[IndexController::class,'index'] );
Route::get('/women',[ProductController::class,'women'] );
Route::get('/catgeory/{category_name}', [ProductController::class,'women']);
Route::get('/contact', [ProductController::class,'index']);




Route::get('/admin',[ProductController::class,'admin'] );
Route::get('/admin/products',[ProductController::class,'products'] );
Route::get('/admin/add_products',[ProductController::class,'add_products'] );
Route::post('/admin/add_products',[ProductController::class,'ret_products'] );
Route::get('/admin/add-products-variant',[ProductController::class,'add_products_var'] );
Route::post('/admin/add-products-variant',[ProductController::class,'ret_products_var'] );
Route::get('/admin/view-product/{id}',[ProductController::class,'ret_products_var'] );
Route::get('/admin/edit-product/{id}',[ProductController::class,'ret_products_var'] );
Route::post('/admin/edit-product/{id}',[ProductController::class,'ret_products_var'] );






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
