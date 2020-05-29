

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
            <th scope="col">E-mail</th>
            <th scope="col">Delete</th>
            <th scope="col">His Coach</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($mems as $mem)
            <tr>
                <th scope="row">{{$mem->id}}</th>
                <td>{{$mem->name}}</td>
                <td>{{$mem->age}}</td>
                <td>{{$mem->Weight}}</td>
                <td>{{$mem->email}}</td>

            <td><form action="{{$mem->id}}/MemberDelete" method="POST">
                @csrf    
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete!</button>
                </form></td>
                <td>
                  @if($mem->coach==null)
                  <div class="form-group">
                  <a class="btn btn-primary" href="/admin/{{$mem->id}}/SetCoach">Assign A Coach!</a>  
                  </div>
                  @else
                 {{$mem->coach->name}}
                 <div>
                  <a href="/admin/{{$mem->id}}/SetCoach">
                    <small>
                    Change The Dude's Coach
                    </small></a>
                 </div>
                @endif
                </td>

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
