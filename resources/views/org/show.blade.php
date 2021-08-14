@extends('templates.template')

@section('title')
    
@endsection

@section('content')
<h3>{{$organiser->name}}s Details</h3>
<div class="panel">
    <h5>Organiser ID: {{$organiser->id}}</h5>
    <h5>{{$organiser->email}}</h5>
    <h5>Member since: {{$organiser->created_at}}</h5>
</div>
<hr>
<h3>{{$organiser->name}}s Events</h3>
@if (count($organiser->events) > 0)
        <div class="accordion accordion-flush" id="eventsAccordion">
            <div class="accordion" id="accordionExample">
                @foreach ($organiser->events as $event)
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$event->id}}" aria-expanded="false" aria-controls="flush-collapse{{$event->id}}">
                            {{$event->eventTitle}}
                            </button>
                        </h2>
                        <div id="collapse{{$event->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col">{{$event->eventDescription}}</div>
                                <div class="col"><a href="/events/{{$event->id}}" class="btn btn-secondary" role="button">View</a></div>
                            </div>
                        </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
        @else
        <p>No Events</p>
        @endif
@endsection