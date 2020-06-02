
@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/member/SendMessage/{{$hisCoach->id}}" method="POST">
        @csrf
        <div class="container">
            <div class="form-group">
            <label for="message" style="color: white" class="pb-3">Send Coach {{$hisCoach->name}} a message</label>
                    
                    <input type="text" class="form-control" name="subject">
                    <div class="input-group pt-3">
                      <textarea class="form-control" aria-label="With textarea" name="memberMessage" placeholder="Type Your Message" rows="4"></textarea>
                    </div>

                   
                  </div>
                  <div class="form-group pt-4">
                    <button type="submit"  class="btn btn-primary">Send!</button>  
                  </div>
              
        
        </div>
        
    </form>


</div>


@endsection