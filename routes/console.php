<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;
use App\Models\ProductPharmacy;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('products:search-cheapest {product}', function ($product) {
    $headers=['id','name','price'];
    $arr=[];
    $product_id =$this->arguments('product');
    $product=Product::find($product_id);

    $product->load(['pharmaciesrel']);

    $pharmacies=$product[0]->limitpharmacies;
    $productPharmacies=ProductPharmacy::all();
    foreach ($pharmacies as $key => $value) {
        $pharmacy_id=$pharmacies[$key]->id;
        
        $pharmacyName=$pharmacies[$key]->name;
       
       
              foreach ($productPharmacies as $key2 => $value2) {
                    if($productPharmacies[$key2]->product_id ==$product[0]->id && $productPharmacies[$key2]->pharmacy_id==$pharmacy_id){
                $pharmacy_price=$productPharmacies[$key2]->price;
                
                           }
                  }
        array_push($arr,[
              $pharmacy_id,
               $pharmacyName,
                $pharmacy_price
            ]);
           }
      $this->table($headers,$arr);

   
});
