@extends('layouts.app');

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
                <h1>Pharmacies <small class="text-muted">Showing All Pharmacies</small></h1>
                <div class="m-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('pharmacies.create')}}">Create New Pharmacies</a>
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
           {{-- <hr> --}}
           @if($pharmacies->count())
           {{$pharmacies->links()}}
               @foreach ($pharmacies as $pharmacy)
                  @include('pharmacies.pharmacy-card',['pharmacy'=>$pharmacy]);
               @endforeach
             
           @endif
         
       
</div>

@endsection