@extends('layouts.app');

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Create Pharmacy</h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('pharmacies.dashboard')}}">view Pharamcy Dashboard</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
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

          
            <form action="{{route('pharmacies.store')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3 mb-3">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class='form-control' id='exampleInputName' name='name' placeholder="Enter Pharmacy Name">
                </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputAddress">Address</label>
                    <input type="text" class="form-control" id="exampleInputAddress"  name='address' placeholder="Enter Pharmacy Address">
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Create Pharmacy</button>
            </form>
            
        </div>
    </div>
</div>

@endsection