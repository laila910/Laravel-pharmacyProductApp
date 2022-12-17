<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $table='pharmacies';

    protected $guarded=[];

    protected $fillable=['name','address'];
   

    public function getPrettyCreatedAttribute(){
        return date('F d, Y',strtotime($this->created_at));
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_pharmacies');
    }
}
