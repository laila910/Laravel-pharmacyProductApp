<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdatePrice;
use App\Http\Requests\StoreAndUpdateProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductQuery;
use App\Models\ProductPharmacy;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter=new ProductQuery();
        $queryItems=$filter->transform($request);
        if(count($queryItems)==0){
            return ProductsResource::collection(Product::paginate());
        }
        else{
            return ProductsResource::collection(Product::where($queryItems)->paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateProductRequest $request)
    {
        if($request->image){
            $image=time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/'), $image);
        }else{
            $image=null;
        }
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image
          ]);
        return 'Successfully Product Created :)';
    }


    public function addOrUpdateProductPriceWithPharmacy(StoreAndUpdatePrice $request,Product $product){
          
        ProductPharmacy::updateOrCreate([
            'product_id'=>$request->product_id,'pharmacy_id'=>$request->pharmacy_id],
            ['price'=>$request->price,'quantity'=>$request->quantity
        ]);
        return 'Successfully created Or Updated Product Price';
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['pharmacies']);
        $pharmacies=$product->pharmacies;
        $arr=array();
        $product_id=$product->id;
        $productPharmacies=ProductPharmacy::where('product_id','=',$product_id)->get('price');
     
        for ($i=0; $i <count($pharmacies) ; $i++) { 
            $data['pharmacy_id']=$pharmacies[$i]->id;
            $data['pharmacy_name']=$pharmacies[$i]->name;
            $data['price']=$productPharmacies[$i];
            array_push($arr,(object)$data);
        }
        $product->extra=(object) ['arr'=>$arr];

         return new ProductResource($product);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->image) {
            $path=public_path('images/').$product->image;
            if(file_exists($path)){
                @unlink($path);
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $imageName);
        }else{
            $imageName=$product->image;
        }
         $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->imageName,
        ]);  
        return 'Successfully Updated Product :)';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {       
      if ($product->image) {
          $path=public_path('images/').$product->image;
          @unlink($path);
       }
         $product->delete();
         return 'successfully deleted Product';
    }
}
