@extends('templates.template')

@section('title')
    Edit Event
@endsection

@section('content')
    <h3>Edit Event</h3>
    {!!Form::open(['action' => ['App\Http\Controllers\EventsController@destroy', $event->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}
<br><br>
    {!! Form::open(['action' => ['App\Http\Controllers\EventsController@update', $event->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('eventTitle', 'Event Title')}}
        {{Form::text('eventTitle', $event->eventTitle, ['class'=> 'form-control', 'placeholder' => 'Event Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventDescription', 'Event Description')}}
        {{Form::textarea('eventDescription', $event->eventDescription, ['class'=> 'form-control', 'placeholder' => 'Event Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventCategory', 'Event Description')}}
        {{Form::select('eventCategory', array('S' => 'Sport', 'C' => 'Culture', 'O' => 'Other'))}}
    </div>  

    <div class="form-group">
        {{Form::date('eventDate', date('d-m-y'))}}
    </div>  
    
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit', ['class'=>'btn btn-primary']);}}

    {!! Form::close() !!}
@endsection