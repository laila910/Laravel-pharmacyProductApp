<?php

namespace App\Http\Resources\V1;

use App\Models\Pharmacy;
use App\Models\ProductPharmacy;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'ProductImage'=>$this->image,
            // 'pharmacies'=>$this->pharmacies,
            'priceOfEveryPharmacy'=>$this->extra->arr
        ];
    }
}
