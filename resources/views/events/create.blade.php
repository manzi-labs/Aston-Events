@extends('templates.template')

@section('title')
    New Event
@endsection

@section('content')
    <h3>Create Event</h3>
    <br>
    {!! Form::open(['action' => 'App\Http\Controllers\EventsController@store', 'enctype' => 'multipart/data', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
        {{Form::label('eventTitle', 'Event Title')}}
        {{Form::text('eventTitle', '', ['class'=> 'form-control', 'placeholder' => 'Event Title'])}}
    </div>
    <div class="form-group">
        {{Form::file('eventImg', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventDescription', 'Event Description')}}
        {{Form::textarea('eventDescription', '', ['class'=> 'form-control', 'placeholder' => 'Event Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventCategory', 'Event Category')}}
        {{Form::select('eventCategory', array('S' => 'Sport', 'C' => 'Culture', 'O' => 'Other'))}}
    </div>
    <div class="form-group">
        {{Form::date('eventDate', date('d-m-y'))}}
    </div>  
        {{Form::submit('submit', ['class'=>'btn btn-primary']);}}

    {!! Form::close() !!}
@endsection