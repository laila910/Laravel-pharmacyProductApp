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
            <h1>Edit Pharmacy <small class="text-muted">{{$pharmacy->name}}</small></h1>
            <div class="m-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('pharmacies.dashboard')}}">View Pharmacies Dashboard</a>
                      <a class="dropdown-item" href="{{route('pharmacies.show',['pharmacy'=>$pharmacy->id])}}">View Pharmacy</a>
                      
                     
                     
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item text-danger" onclick="deletePharmacy()">Delete Pharmacy</a> 
                      <form action="{{route('pharmacies.delete',$pharmacy->id)}}" id="delete-pharmacy-form" method='POST' style='display:none'>
                        @csrf
                        @method('DELETE')
                      </form>
                     
                    </div>
                  </div>
            </div>
        </div>
    </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card p-5">
               <h5>Edit Pharmacy Details</h5>
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
               <form action="{{route('pharmacies.update',$pharmacy->id)}}" method='POST' enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group mt-3 mb-3">
                      <label for="exampleInputName">Name</label>
                      <input type="text" class='form-control' id='exampleInputName' name='name' placeholder="Enter Pharmacy Name" value='{{$pharmacy->name}}'>
                  </div>
                  <div class="form-group mb-3">
                      <label for="exampleInputAddress">Address </label>
                      <input type="text" class="form-control" id="exampleInputAddress"  name='address' placeholder="Enter Address" value='{{$pharmacy->address}}'>
                    </div>
                  
                   
                      <button type="submit" class="btn btn-primary">Update Pharmacy Details</button>
                   
              </form>
            </div>
         </div>
    </div>

   </div>
  
</div>
@endsection

@push('footer-scripts')
    <script>
        function deletePharmacy(){
            var r = confirm("Are you sure you want to delete this Pharmacy? this can't be undone!");
            if(r){
                document.querySelector('form#delete-pharmacy-form').submit();
            }
        }
    </script>
@endpush