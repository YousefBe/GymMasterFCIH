

@extends('layouts.app')

@section('content')
<div class="container pt-4">

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">salary</th>
            <th scope="col">age</th>
            <th scope="col">E-mail</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cocs as $coach)
            <tr>
                <th scope="row">{{$coach->id}}</th>
                <td>{{$coach->name}}</td>
                <td>{{$coach->salary}}</td>
                <td>{{$coach->age}}</td>
                <td>{{$coach->email}}</td>

            <td><form action="{{$coach->id}}/CoachDelete" method="POST">
                @csrf    
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete!</button>
                </form></td>
            </tr>
            @endforeach
        
        </tbody>
      </table>
      <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
          {{$cocs->links()}}
        </div>
      </div>
     

</div>

  
  
@endsection
