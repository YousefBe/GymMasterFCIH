
@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/coach/{{$user->id}}/SavePLan" method="POST">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="form-group">
                <label for="plan" style="color: white" class="pb-3">set {{$user->name}}'s plan</label>
                    
                    <select class="form-control form-control-sm" id="CoachPlan" name="CoachPlan">
                        <option>Plan A : Fitness</option>
                        <option>Plan B : Cardio</option>
                        <option>Plan C : Body Building</option>
                      </select>
                  </div>
                  <div class="form-group pt-4">
                    <button type="submit"  class="btn btn-primary">Set Plan</button>  
                  </div>
              
        
        </div>
        
    </form>


</div>


@endsection