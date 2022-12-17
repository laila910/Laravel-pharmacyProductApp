<?php

// prefix: customers
use App\Http\Controllers\PharmacyController;
use App\Models\Pharmacy;

Route::get('/',[PharmacyController::class,'index'])->name('dashboard');//name: pharmacies.dashboard
Route::get('create',[PharmacyController::class,'create'])->name('create'); //name : pharmacies.create

Route::get('{pharmacy}/edit',[PharmacyController::class,'edit'])->name('edit');//name :pharmacies.edit

Route::get('{pharmacy}',[PharmacyController::class,'show'])->name('show');//name: pharmacies.show
// ->where('user','[0,9]+')
Route::post('/',[PharmacyController::class,'store'])->name('store');//name: pharmacies.store

Route::put('{pharmacy}',[PharmacyController::class,'update'])->name('update');//name: pharmacies.update

Route::delete('{pharmacy}',[PharmacyController::class,'destroy'])->name('delete');//name: pharmacies.delete

Route::post('/storeRecord',[PharmacyController::class,'addRecordAction'])->name('add.recordAction');