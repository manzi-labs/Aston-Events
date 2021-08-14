@extends('templates.template')

@section('title')
Organisers
@endsection
@section('content')
<h3>Organisers</h3>
@if (count($organisers) > 0)
<table class="table">
    <tr>
        <th>Organiser ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number of events</th>
    </tr>
    @foreach ($organisers as $organiser)
    <tr>
    <td>
        <a href="/organisers/{{$organiser->id}}">{{$organiser->id}}</a> 
    </td>
    <td>
        <a href="/organisers/{{$organiser->id}}">{{$organiser->name}}</a> 
    </td>
    <td>
        {{$organiser->email}}
    </td>
    <td>
        {{count($organiser->events)}}
    </td>
    </tr>
    @endforeach
</table>
@else
No Organisers found...
@endif
@endsection