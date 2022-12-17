<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $guarded=[];

    public function getPrettyCreatedAttribute(){
        return date('F d, Y',strtotime($this->created_at));
    }

    protected $fillable=['title','description','image'];

   
    public function limitpharmacies(){
        return $this->belongsToMany(Pharmacy::class,'product_pharmacies')->limit(5)->orderby('price');
    }
    public function pharmacies(){
      return $this->belongsToMany(Pharmacy::class, 'product_pharmacies');
    }
   
   public function pharmaciesrel(){
        return $this->limitpharmacies();
   }

 
}
    
   

