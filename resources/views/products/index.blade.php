
@extends('layouts.app');

@section('content')

<div class="container">
  @if(session('success'))
     <div class="alert alert-success mt-3">
        {{session('success')}}
     </div>
@endif
@isset($SearchPage)
<div class="alert alert-success mt-3">
  {{$SearchPage}}
</div>
@endisset
    


    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Products <small class="text-muted">Showing All Products</small></h1>
                <form class="m-3 form-inline" action="{{ route('products.dashboard') }}" method="GET">
                  <div class="form-group">
                   @isset($search)
                    <input type="text" name="search" class="form-control" placeholder="Search on Product :)" value="{{$search}}"/>
                  @else
                   <input type="text" name="search" class="form-control" placeholder="Search on Product :)" />
                  @endisset
                  </div>
                  {{-- <button type="submit" class="btn btn-primary mb-2">Search Product</button> --}}
              </form>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('products.create')}}">Create New Product</a>   
                          <a class="dropdown-item" href="{{route('products.dashboard')}}">Return to products dashboard</a>
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
           {{-- <hr> --}}
           @if($products->count())
             @isset($search)
           {{-- {{$products->links()}} --}}
               @foreach ($products as $product)
                  @include('products.product-card',['product'=>$product,'pharmacies'=>$pharmacies]);
               @endforeach
              @else
 @foreach ($products as $product)
 @include('products.product-card',['product'=>$product,'pharmacies'=>$pharmacies]);
@endforeach
{{$products->links()}}

              @endisset
           @endif
         
           {{-- @if($users->count())
             <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)
                     <tr>
                        <td style="width: 10%">
                          @if($user->image)
                            <img src="{{asset('images/'.$user->image)}}" width="100%" class="rounded" alt="">
                          @else
                            <img src="{{asset('images/male.jpg')}}" width="100%" class="rounded" alt="">
                          @endif
                      
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->admin == 1) true @else false @endif</td>
                        <td>{{$user->pretty_created}}</td>
                        <td></td>
                     </tr>
                   @endforeach
                </tbody>
            </table>
           @endif --}}
       
</div>

@endsection