<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
//***************************Front end routes***************************************************** */
Route::get('/',[ProductController::class,'index'] );
Route::get('/category/{category_name}', [ProductController::class,'women'])->name('frontend.women');
Route::get('/category/product/{id}', [ProductController::class,'show'])->name('frontend.show');
Route::get('/blog', [ProductController::class,'blog']);
Route::get('/blog/{id}', [ProductController::class,'blog_details'])->name('frontend.blog');
Route::get('/contact', [ProductController::class,'contact']);
Route::get('/cart', [ProductController::class,'cart']);
Route::get('/add-to-cart', [ProductController::class,'addToCart'])->name('cart.add');
Route::get('/checkout', [ProductController::class,'checkout']);


Route::get('/admin',[ProductController::class,'admin'] );
Route::get('/admin/products',[ProductController::class,'products'] );
Route::get('/admin/add_products',[ProductController::class,'add_products'] );
Route::post('/admin/add_products',[ProductController::class,'ret_products'] );
Route::get('/admin/add-products-variant',[ProductController::class,'add_products_var'] );
Route::post('/admin/add-products-variant',[ProductController::class,'ret_products_var'] );
Route::get('/admin/view-product/{id}',[ProductController::class,'view_product'] );
Route::get('/admin/edit-product/{id}',[ProductController::class,'ret_view_products'] );
Route::post('/admin/edit-product/{id}',[ProductController::class,'ret_edit_product'] );
Route::post('/admin/delete-product/{id}',[ProductController::class,'delete_product'] );






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
