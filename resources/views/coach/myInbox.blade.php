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
                @if($message->Sender != Auth::user()->name)
                    <tr>
                        <td>{{$message->Sender}}</td>
                        <td><a href="{{route('msgD',$message->id)}}">{{$message->subject}}</a></td>
                
                    </tr>
                 @endif
            @endforeach
            
        </tbody>
    </table>
    
</div>

@endsection