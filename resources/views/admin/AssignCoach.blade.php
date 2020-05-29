
@extends('layouts.app')

@section('content')
<div class="container">

<form action="/admin/{{$user->id}}/CA" method="POST">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="form-group">
            <label for="coach Assigment" style="color: white" class="pb-3">Set {{$user->name}}'s Coach !</label>
            <select class="form-control form-control-sm" id="Coach" name="SetCoach">
                @foreach ($coaches as $coach)
            <option value="{{$coach->id}}">{{$coach->name}}</option>
                @endforeach
            </select>  

                  </div>
                  <div class="form-group pt-4">
                    <button type="submit"  class="btn btn-primary">Assign!</button>  
                  </div>
              
        
        </div>
        
    </form>


</div>


@endsection