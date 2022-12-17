@extends('layouts.app')

@section('content')
<div class='container'>
<div class="card mt-3">
    <div class="card-body">
         <div class="row">
            
            <div class="col-sm-6">
                <h5>{{$pharmacy->name}}</h5>
                <ul>
                    <li>
                        <strong>Pharmacy Name :</strong> {{$pharmacy->name}}
                    </li>
                    <li>
                        <strong>Date Added: </strong>{{$pharmacy->pretty_created}}
                    </li>
                   <li>
                        <strong>Address:</strong>{{$pharmacy->address}}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('pharmacies.edit',['pharmacy'=>$pharmacy->id])}}">Edit</a>
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