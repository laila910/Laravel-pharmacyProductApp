@extends('layouts.app')

@section('content')
<div class='container'>
<div class="card mt-3">
    <div class="card-body">
         <div class="row">
            <div class="col-sm-3 col-md-2">
               @if ($product->image)
                <img src="{{asset('images/'.$product->image)}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
               @else
               <img src="{{asset('images/noProduct.jpg')}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
               @endif
            </div>
            <div class="col-sm-6">
                <h5>{{$product->name}}</h5>
                <ul>
                    <li>
                        <strong>Product Name :</strong> {{$product->title}}
                    </li>
                    <li>
                        <strong>Date Added: </strong>{{$product->pretty_created}}
                    </li>
                    <li>
                        <strong>Product Description:</strong> {{$product->description}} 
                    </li>
                    <li>
                      <strong>Product Prices:</strong><br>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Product Pharmacy</th>
                            <th scope="col">Product Price</th>
                           <th scope="col">Product Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($product->pharmacies as $pharmacy)
                          <tr>
                            <th scope="row">{{$pharmacy->name}}</th>
                            @foreach($productPharmacies as $productPharmacy)
                            @if($product->id==$productPharmacy->product_id && $pharmacy->id ==$productPharmacy->pharmacy_id)
                              <td>{{$productPharmacy->price}} EGP</td>
                              <td>{{$productPharmacy->quantity}}</td>
                            @endif
                            @endforeach
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('products.edit',['product'=>$product->id])}}">Edit Product</a>
                      <a class="dropdown-item" href="{{route('products.show',['product'=>$product->id])}}">View Product</a>
                      <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#PriceModal">
                        Add New Price of Pharmacy
                      </button> 
                    
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item text-danger" onclick="deleteProduct()">Delete Product</a> 
                      <form action="{{route('products.delete',$product->id)}}" id="delete-product-form" method='POST' style='display:none'>
                        @csrf
                        @method('DELETE')
                      </form>
                    </div>
                  </div>
            </div>
         </div>
    </div>
</div>
</div>
@endsection
<!-- Modal -->
<div class="modal fade" id="PriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form  action="{{route('products.addPrice',['product'=>$product->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group mt-3 mb-3">
                  <label for="exampleInputPrice">Product Price</label>
                  <input type="text" id='price' class='form-control' id='exampleInputPrice' name='price' placeholder="Enter Product Price" >
              </div>
              <div class="form-group mt-3 mb-3">
                <label for="exampleInputQuantity">Product Quantity in this Pharmacy</label>
                <input type="text" id='price' class='form-control' id='exampleInputQuantity' name='quantity' placeholder="Enter Product Quantity" >
            </div>

            <div class="form-group mt-3 mb-3">
              <select class="form-select" aria-label="Default select example" name="pharmacy_id">
                <option selected>Select Pharmacy</option>
                   @foreach ($pharmacies as $pharmacy)
                     <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                    @endforeach
              </select>
            </div>

              

                <button type="submit" class="btn btn-primary">Create Product</button>
          </form>
      </div>
      
    </div>
  </div>
</div>
{{-- end Modal --}}