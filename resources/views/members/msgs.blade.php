@extends('layouts.app')

@section('content')

<div class="container pt-4">

    <table class="table table-dark">

        <thead>
            <tr>
                <th>From </th>
                <th>Message </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <th>{{$message->Sender}}</th>
            <th><a href="/member/TheMsg/{{$message->id}}">{{$message->subject}}</a></th>
        
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

@endsection