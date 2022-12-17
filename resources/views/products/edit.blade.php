@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
      <div class="alert alert-success mt-3">
        {{session('success')}}
      </div>
    @endif
   <div class="card mt-3">
    <div class="card-body">
        <div class="d-flex">
            <h1>Edit Product<small class="text-muted">{{$product->title}}</small></h1>
            <div class="m-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('products.dashboard')}}">View Products Dashboard</a>
                      <a class="dropdown-item" href="{{route('products.show',['product'=>$product->id])}}">View Product</a>
                      {{-- @if(Auth::user()->admin ==1 || Auth::user()->id == $user->id)
                      <a class="dropdown-item" data-toggle='modal' data-target='#ChangePassword'>Change Password</a>
                      @endif --}}
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
   {{-- update their name and email and profile image --}}
   <div class="row">
      <div class="col-sm-4">
         {{-- Placeholder for image and option to change out just the image --}}

         <div class="card mt-3">
            <div class="card-body">
                @if ($product->image)
                  <img src="{{asset('images/'.$product->image)}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
                @else
                  <img src="{{asset('images/noProduct.jpg')}}" style='max-width:100%;max-height:100px' class="rounded" alt="">
                @endif
                <hr>
                <button class="btn btn-outline-primary btn-sm btn-block" data-toggle='modal' data-target='#UpdateProductImage'>Upload New Product Image</button>
                   @if($product->image)
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="deleteProductImage()"><i class="fas fa-trash"></i>Delete Product Image</button>
                   <form action="{{route('products.delete.productImage',$product->id)}}" method='POST' id="delete-product-image-form">
                      @csrf
                      @method('Delete')
                     
                    </form>
                  @endif
               
                
               
               
            </div>
         </div>
         {{-- <div class="card mt-1">
            <div class="card p-5">
                <h5>Update Password</h5>
                <hr>
                @if($errors->count())     
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                          <li>{{$item}}</li>
                        @endforeach
                    </ul> 
                </div>
                @endif
            <form action="{{route('users.update',['user'=>$user->id])}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                   <label for="exampleInputPassword1">Update Password</label> 
                    <input type="password" class="form-control" id="exampleInputPassword1"  name='password' placeholder="Enter New Password">
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
            </div>
         </div> --}}
      </div>
      <div class="col-sm-8">
        <div class="card mt-3">
            <div class="card p-5">
               <h5>Edit Product Details</h5>
               <hr>
               @if($errors->count())     
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $item)
                         <li>{{$item}}</li>
                       @endforeach
                   </ul> 
               </div>
               @endif
               <form action="{{route('products.update',$product->id)}}" method='POST' enctype="multipart/form-data">
                  @csrf
                  {{-- <input type="hidden" name="_method" value="PUT"> --}}
                  @method('PUT')
                  <div class="form-group mt-3 mb-3">
                      <label for="exampleInputName">Product Name</label>
                      <input type="text" class='form-control' id='exampleInputName' name='title' placeholder="Enter Product Name" value='{{$product->title}}'>
                  </div>
                  <div class="form-group mb-3">
                      <label for="exampleInputDescription">Product Description</label>
                      <input type="text" class="form-control" id="exampleInputDescription"  name='description' placeholder="Enter Address" value='{{$product->description}}'>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product Description</button>
                   
              </form>
             
            </div>
         </div>
      
        {{-- <div class="card mt-5">
            <div class="card p-5">
                <h5>Edit Address Details</h5>
                <hr>
                @if($errors->count())     
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                          <li>{{$item}}</li>
                        @endforeach
                    </ul> 
                </div>
                @endif
                <form action="{{route('users.update',['user'=>$user->id])}}" method='POST' enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                   <div class='form-group mb-3'>
                    <label for="exampleFormControlAddress">Address</label>
                    <input type="text" class='form-control' id='exampleFormControlAddress' value='{{$user->address}}' name='address' placeholder="User Address">
                   </div>
                   @if(Auth::user()->admin ==1 || Auth::user()->id == $user->id)

                     <button type="submit" class="btn btn-primary">Update Address Details</button>
                   

               </form>
               @else
               <a  class="btn btn-primary" onclick="NotAllowed()">Update Address Details</a>
               @endif
             </div>
        </div> --}}
    </div>

   </div>
  
   {{-- update or add their address --}}
</div>
<!-- Modal for updating Image -->
<div class="modal fade" id="UpdateProductImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Product Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('products.update.productImage',$product->id)}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class='form-group mb-3'> 
                    <label for="exampleFormControlImage">Product Image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlImage" name='image'>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Product Image</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal for change the password --}}
  {{-- <div class="modal fade" id="ChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('users.update',$user->id)}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Update Password</label> 
                    <input type="password" class="form-control" id="exampleInputPassword1"  name='password' placeholder="Enter New Password">
                </div>
                  <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
      </div>
    </div>
  </div> --}}

@endsection

@push('footer-scripts')
    <script>
        function deleteProductImage(){
            var r =confirm('Are you sure you want to delete the product Image?');
            if(r){
                document.querySelector('form#delete-product-image-form').submit();
            }
        }
        function deleteProduct(){
            var r = confirm("Are you sure you want to delete this Product? this can't be undone!");
            if(r){
                document.querySelector('form#delete-product-form').submit();
            }
        }
        // function NotAllowed(){
        //   var r = confirm("You are not allowed to make changes to this user");
              
        //  }
    </script>
@endpush