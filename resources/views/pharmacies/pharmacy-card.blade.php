<div class="card mt-3 pharmacy-card">
    <div class="card-body">
         <div class="row">
            <div class="col-sm-6">
                <h5>{{$pharmacy->name}}</h5>
                <ul>
                    <li>
                        <strong>Pharmacy Name:</strong> {{$pharmacy->name}}
                    </li>
                    <li>
                        <strong>Date Added: </strong> {{$pharmacy->pretty_created}}
                    </li>
                    <li>
                        <strong>Address:</strong> {{$pharmacy->address}}
                    </li>
                    {{-- <li>
                        <strong>Company:</strong>@if($customer->company) {{$customer->company}} @else ... @endif
                    </li>
                    <li>
                        <strong>Website:</strong> {{$customer->website}}
                    </li> --}}
                    {{-- <li>
                      
                        @foreach($allUsers as $user)
                           @if($user->id == $customer->createdBy)
                             <strong>Created By:</strong> {{$user->name}} @if($user->admin==1) - Admin @else - Employee @endif
                           @endif
                        @endforeach
                       
                    </li> --}}
                    {{-- <li>
                        @foreach($allUsers as $user)
                           @if($user->id == $customer->user_id)
                            <strong>Assigned To:</strong> {{$user->name}} @if($user->admin==1) - Admin @else - Employee @endif
                           @endif
                        @endforeach
                    </li> --}}
                    {{-- <li>
                        @foreach($allRecords as $record)
                           @if($record->customer_id ==$customer->id)
                             <p><strong>Record No. {{$record->id}}:</strong> <br> &nbsp; &nbsp; &nbsp; Status: {{$record->status}}
                            <br> &nbsp; &nbsp; &nbsp; Notes: {{$record->notes}}
                            <br> &nbsp; &nbsp; &nbsp; Added at: {{$record->pretty_created}} </p>
                           @endif
                        @endforeach
                    
                    </li> --}}
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        
                      <a class="dropdown-item" href="{{route('pharmacies.edit',['pharmacy'=>$pharmacy->id])}}">Edit Pharmacy</a>
                        {{-- <a class="dropdown-item" data-toggle='modal' data-target='#AddActionToThisCustomer'>Add Record Action</a>  --}}
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
 {{-- Modal for Assign To Another User --}}
 {{-- <div class="modal fade" id="AddActionToThisCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria- 
   hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Record Action</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('customers.add.recordAction')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class='form-group mb-3'>
                  <select class="form-control" id="exampleInputAssignedTo" name="status">
                         <option value="call">Call</option>
                         <option value="visit">Visit</option>
                         <option value="follow Up">Follow Up</option>
                   </select>
                 </div>
                 
                    <div class="form-group mt-3 mb-3">
                        <label for="exampleInputNotes">Notes</label>
                        <input type="text" class='form-control' id='exampleInputNotes' name='notes' placeholder="Enter Your Notes">
                    </div>
                    <input type="hidden" name='customer_id' value='{{$customer->id}}'>
                
                  <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- end Modal  --}}

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