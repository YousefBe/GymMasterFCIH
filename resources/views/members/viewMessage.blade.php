@extends('layouts.app')

@section('content')
<div class="container pt-4">

    <div class="card text-center">
        <div class="card-header">
            coach {{$msg->Sender}} Says ..
        </div>
        <div class="card-body">
          <h5 class="card-title"> {{$msg->subject}}</h5>
          <p class="card-text">{{$msg->message}}</p>
          <a href="/member/DMYorCoach" class="btn btn-primary">Replay!</a>
        </div>
        <div class="card-footer text-muted">
            date of sending  {{$msg->created_at}}
        </div>
      </div>

</div>    



  @endsection