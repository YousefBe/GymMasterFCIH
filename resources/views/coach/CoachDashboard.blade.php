@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        
            <div class="card text-white bg-dark mb-3" style=" width:440px; border-radius:4%">
                <div class="card-header">Coach</div>
                @if(Auth::user()->image =='default.jpg' )
                     <img src="{{asset('storage/uploads/' .Auth::user()->image) }}" class = "pt-2"alt="nothingBoy" style="width:130px; height:130px ; float:left ; border-radius:50% ;  margin:auto;" >
                @else
                    <img src="{{asset('storage/' .Auth::user()->image) }}" alt="nothingBoy" style="width:130px; height:130px ; float:left ; border-radius:50% ;  margin:auto;" >

                  @endif

                <div class="card-body">
                <h5 class="card-title">{{Auth::user()->name}}'s Profile</h5>

                  <p class="card-text">My Name : {{$user->name}}</p>
                  <p class="card-text">My E-mail : {{$user->email}}</p>
                  <p class="card-text">Age : {{$user->age}}</p>

                   
                
                </div>
                <div class="card-footer">
                    <small class="text-muted">Member since : {{$user->created_at}}</small>
                  </div>
         </div>
     
    </div>
</div>
@endsection
