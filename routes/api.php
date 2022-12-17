<?php


use Illuminate\Support\Facades\Route;


//Api/V1
//localhost:8000/api/v1/products ---> for index all products
//localhost:8000/api/v1/pharmacies  ---> for index all pharmacies
//localhost:8000/api/v1/products/1 --> for show one product:) id is change as we wish 

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'],function(){
    Route::apiResource('products',ProductApiController::class);
    Route::apiResource('pharmacies',PharmacyApiController::class); 
    Route::post('add-UpdateProductPrice',['uses'=>'ProductApiController@addOrUpdateProductPriceWithPharmacy']);

});
