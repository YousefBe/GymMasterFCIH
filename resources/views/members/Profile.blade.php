@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        
            <div class="card text-white bg-dark mb-3" style=" width:440px; border-radius:4%">
                <div class="card-header">Member</div>
                @if(Auth::user()->image =='default.jpg' )
                     <img src="{{asset('storage/uploads/' .Auth::user()->image) }}" class = "pt-2"alt="nothingBoy" style="width:130px; height:130px ; float:left ; border-radius:50% ;  margin:auto;" >
                @else
                    <img src="{{asset('storage/' .Auth::user()->image) }}" alt="nothingBoy" style="width:130px; height:130px ; float:left ; border-radius:50% ;  margin:auto;" >

                  @endif

                <div class="card-body">
                <h5 class="card-title">{{Auth::user()->name}}'s Profile</h5>

                  <p class="card-text">My Name : {{$user->name}}</p>
                  <p class="card-text">My E-mail : {{$user->email}}</p>

                    @if($user->coach== null)
                         <p class="card-text">No Coach Assigned Yet !</p>
                    @else
                        <p class="card-text">My Coach : {{$user->coach->name}}</p> 
                    @endif    

                  <p class="card-text">My Age : {{$user->age}}</p>

                  <p class="card-text">My Weight : {{$user->Weight}}</p>

                  <p class="card-text">My height : {{$user->height}} CM</p>


                  <p class="card-text">My ideal Weight : {{(($user->height-152.4)*1.1)+48}}</p>


                  <p class="card-text">My Plan : {{$user->CoachPlan}}</p>
                
                </div>
                <div class="card-footer">
                    <small class="text-muted">Member since : {{$user->created_at}}</small>
                  </div>
         </div>
     
    </div>
</div>
@endsection
