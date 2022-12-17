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
                      
                      {{-- <a class="dropdown-item" data-toggle='modal' data-target='#AssignToAnotherUser'>Assign To Another User</a> --}}
                     
                     
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
   {{-- update their name and email and profile image --}}
   <div class="row">
      {{-- <div class="col-sm-4">
         <div class="card mt-3">
            <div class="card-body">
              <h5>Assign To Another User</h5>
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
              <form action="{{route('customers.update',$customer->id)}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='form-group mb-3'>
                  <select class="form-control" id="exampleInputAssignedTo" name="user_id" placeholder="Customer Assigned To">
                     @if($userLogin)
                      <option value="{{$userLogin->id}}" selected>{{$userLogin->name}}</option>
                     @endif
                     @foreach ($allUsers as $user)
                       @if($userLogin->id != $user->id)
                         <option value="{{$user->id}}">{{$user->name}}</option>
                       @endif
                     @endforeach
               </select>
                  
                 </div>
                 <button type="submit" class="btn btn-primary float-right">Create Customer</button>
              </form>
            </div>
         </div>
      </div> --}}
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
                     <button type="submit" class="btn btn-primary">Update Address Details</button>
               </form>
             </div>
        </div> --}}
    </div>

   </div>
  
   {{-- update or add their address --}}
</div>
 {{-- Modal for Assign To Another User --}}
 {{-- <div class="modal fade" id="AssignToAnotherUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria- hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Assigned To</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('customers.update',$customer->id)}}" method='POST' enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class='form-group mb-3'>
                <select class="form-control" id="exampleInputAssignedTo" name="user_id" placeholder="Customer Assigned To">
                   @foreach ($allUsers as $user)
                       <option value="{{$user->id}}">{{$user->name}}</option>
                   @endforeach
                 </select>
               </div>
                <button type="submit" class="btn btn-primary">Assigned To another </button>
          </form>
      </div>
    </div>
  </div>
</div> --}}
{{-- end Modal  --}}
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