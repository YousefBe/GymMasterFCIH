@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin  Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            welcome Boss !
                            <a href="/admin/{{$user->id}}/profile">View Profile</a>
                            <a href="/admin/{{ $user->id}}/edit">edit Profile</a>


                            @if($user->image =='default.jpg' )
                            <img src="{{asset('storage/uploads/' .$user->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                            @else
                            <img src="{{asset('storage/' .$user->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                            @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
