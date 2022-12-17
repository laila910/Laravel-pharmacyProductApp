<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAndUpdatePrice;
use App\Http\Requests\StoreAndUpdateProductRequest;
use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\ProductPharmacy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       $pharmacies=Pharmacy::all();
       // Get the search value from the request
       if($request->input('search')){
         $search = $request->input('search');

        // Search in the title and body columns from the posts table
          $products = Product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
            return view('products.index',['products'=>$products,'pharmacies'=>$pharmacies,'search'=>$search,'SearchPage'=>'You are in the search page, return to products dashboard to see all products :) ']);

        
       }else if($request->input('search')==null){
        $products=Product::latest()->paginate(20);
        return view('products.index',['products'=>$products,'pharmacies'=>$pharmacies]);
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('products.create');
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
        return redirect()->route('products.dashboard')->with('success','Successfully created a New Product');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $pharmacies=Pharmacy::all();
        $productPharmacies=ProductPharmacy::all();
        return view('products.show',compact('product','pharmacies','productPharmacies'));
    }

    public function addprice(StoreAndUpdatePrice $request,Product $product){
         $product_id=$product->id;
         $pharmacy_id=$request->pharmacy_id;
         $price=$request->price;
         $quantity=$request->quantity;

        
       
            ProductPharmacy::updateOrCreate([
                'product_id'=>$product_id,'pharmacy_id'=>$pharmacy_id],
                ['price'=>$price,'quantity'=>$quantity
            ]);
      
         return redirect()->route('products.dashboard')->with('success','Successfully Added PharmacyPrice To This Product');
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateProductRequest $request, Product $product)
    {
    
        $product->update($request->validated());
    
       
        return back()->with('success', 'Successfully updated Product details!');
    }
    public function updateProductImage(StoreAndUpdateProductRequest $request,Product $product){
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
            'image'=>$imageName
        ]);
        return back()->with('success','Successfully updated Product image');
    }
    public function destroyProductImage(Product $product){
      if($product->image){
        $path=public_path('public/').$product->image;
        @unlink($path);
        $product->update(['image'=>null]);
      }
      return back()->with('success','Successfuly Deleted Product Image');
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
           $path=public_path('public/').$product->image;
           @unlink($path);
        }
        $product->delete();

        return redirect()->route('products.dashboard')->with('success','Successfuly deleted Products And All assets related to');
        
    }
}
