<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPharmacyResource extends JsonResource
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
            'Product Id'=>$this->product_id,
            'Pharmacy Id'=>$this->pharmacy_id,
            'Product Price'=>$this->price,
            'Product Quantity'=>$this->quantity,
            // 'info'=>ProductPharmacyResource::collection($this->pharmacies),
        ];
    }
}
