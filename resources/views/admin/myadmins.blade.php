

@extends('layouts.app')

@section('content')
<div class="container pt-4">

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
          
           
            <th scope="col">E-mail</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $adamin)
            <tr>
                <th scope="row">{{$adamin->id}}</th>
                <td>{{$adamin->name}}</td> 
                <td>{{$adamin->email}}</td>

            </tr>
            @endforeach
        
        </tbody>
      </table>
      <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
          {{$admins->links()}}
        </div>
      </div>
     

</div>

  
  
@endsection
