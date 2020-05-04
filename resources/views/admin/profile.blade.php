@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')
<div class="box">
    <div class="PContainer">

        <div class="img">
                          @if($admin->image =='default.jpg' )
                            <img src="{{asset('storage/uploads/' .$admin->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                            @else
                            <img src="{{asset('storage/' .$admin->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                            @endif
          <div class="name">  {{$admin->name}}</div> 
        </div>
        <div class="content">
            {{$admin->name}}
        
        </div>
        
    
    </div>
</div>

@endsection