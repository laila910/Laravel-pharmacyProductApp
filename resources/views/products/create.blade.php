@extends('layouts.app');

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Create Product</h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('products.dashboard')}}">view Products Dashboard</a>
                        </div>
                      </div>
                </div>
            </div>
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

          
            <form action="{{route('products.store')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="exampleInputtitle">Name</label>
                    <input type="text" class='form-control' id='exampleInputtitle' name='title' placeholder="Enter Product Name">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputdescription">Description</label>
                    <input type="text" class="form-control" id="exampleInputdescription"  name='description' placeholder="Enter Product Description">
                  </div>
                 
                  <div class='form-group mb-3'> 
                    <label for="exampleFormControlImage">Product Image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlImage" name='image'>
                  </div>
              
                  <button type="submit" class="btn btn-primary float-right">Create Product</button>
            </form>
            
        </div>
    </div>
</div>

@endsection