<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Product;

class ProductPharmacy extends Model
{
    use HasFactory;
    protected $table='product_pharmacies';

    protected $fillable=['product_id','pharmacy_id','price','quantity'];
//     public function product()
// {
//     return $this->belongsTo('App\Product');
// }

// public function pharmacy()
// {
//     return $this->belongsTo('App\Pharmacy');
// }

  
}
