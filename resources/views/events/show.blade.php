@extends('templates.template')

@section('title')
    {{$event->eventTitle}}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h3>{{$event->eventTitle}}</h3>
            <h5>{!! $event->eventDescription !!}</h5>
        </div>
        <div class="col">
            <img src="/storage/eventImages/{{$event->eventImg}}" alt="event cover image">
            <div class="container">
                <div class="row">
                    <div class="col"><h5>Event Interest: {{$event->eventInterest}}</h5></div>
                    {{-- <div class="col"><div class="btn btn-success">Interested!</div></div> --}}
                    {!!Form::open(['action' => ['App\Http\Controllers\EventsController@interested', $event->id], 'method' => 'POST']) !!}
                    @csrf
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('interested', ['class'=>'btn btn-primary']);}}
                    {!!Form::close() !!}                    
                </div>
            </div>
        </div>
    </div>
    
    <small>created at: {{$event->created_at}} | last updated: {{$event->updated_at}}</small>
    <hr>
    
    @if (!Auth::guest())
        @if (Auth::user()->id == $event->user_id)
            <div class="container">
                <div class="btn-group">
                    <a href="/events/{{$event->id}}/edit" class="btn btn-warning"><div class="btn btn-warning">Edit or Delete</div></a>
                </div>
            </div>
        @endif
    @endif
@endsection