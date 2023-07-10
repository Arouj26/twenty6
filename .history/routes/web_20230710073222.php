<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'] );
Route::get('/women',[ProductController::class,'women'] );
Route::get('/admin',[ProductController::class,'admin'] );
// Add products Route
Route::get('/admin/add_products',[ProductController::class,'add_products'] );
Route::post('/admin/add_products',[ProductController::class,'ret_products'] );

//***********************************************Front***************************************************************** */
Route::get('/', [ProductController::class,'index']);
Route::get('/', [ProductController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
