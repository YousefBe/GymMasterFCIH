

@extends('layouts.app')

@section('content')
<div class="container pt-4">

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">Age</th>
            <th scope="col">Weight</th>
            <th scope="col">Height</th>
            <th scope="col">Ideal Wieght</th>
            <th scope="col">DM</th>
            <th scope="col">Plan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($mems as $mem)
            <tr>
                <th scope="row">{{$mem->id}}</th>
                <td>{{$mem->name}}</td>
                <td>{{$mem->age}}</td>
                <td>{{$mem->Weight}}</td>
                <td>{{$mem->height}}</td>
                <td>{{(($mem->height-152.4)*1.1)+48}}</td>
                 <td><a href="/coach/{{$mem->id}}/setPlan"> {{$mem->CoachPlan}}</a></td>
                <td><a href="/coach/{{$mem->id}}/SendMessage">DM</a></td>
            </tr>
            @endforeach
        
        </tbody>
      </table>
      <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
          {{$mems->links()}}
        </div>
      </div>
     

</div>

  
  
@endsection
