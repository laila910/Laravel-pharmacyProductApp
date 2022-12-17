<?php 
// prefix: users
use App\Http\Controllers\ProductController;

Route::get('/',[ProductController::class,'index'])->name('dashboard');//name: products.dashboard
Route::get('create',[ProductController::class,'create'])->name('create'); //name : products.create
Route::get('{product}/edit',[ProductController::class,'edit'])->name('edit');//name : products.edit
Route::get('{product}',[ProductController::class,'show'])->name('show');//name: products.show
// ->where('user','[0,9]+')
Route::post('/',[ProductController::class,'store'])->name('store');
Route::put('{product}',[ProductController::class,'update'])->name('update');
Route::put('{product}/product-image',[ProductController::class,'updateProductImage'])->name('update.productImage');
Route::delete('{product}',[ProductController::class,'destroy'])->name('delete');
Route::delete('{product}/product-image',[ProductController::class,'destroyProductImage'])->name('delete.productImage');
Route::post('{product}/add-price',[ProductController::class,'addprice'])->name('addPrice');
// Route::get('search',[ProductController::class,'search'])->name('searchProduct');
