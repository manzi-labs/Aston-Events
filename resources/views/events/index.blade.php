@extends('templates.template')

@section('title')
    Events
@endsection

@section('content')
    <h3>Events</h3>
    @if (count($events) > 0)
        <table class="table">
            <tr>
                <th>Event Title</th>
                <th>Event Date</th>
                <th>Event Description</th>
                <th>Event Interest</th>
            </tr>
            @foreach ($events as $event)
            <tr>
                <td>
                    <a href="/events/{{$event->id}}">{{$event->eventTitle}}</a>
                </td>
                <td>
                    {{$event->eventDate}}
                </td>
                <td>
                    {{$event->eventDescription}}
                </td>
                <td>
                    {{$event->eventInterest}}
                </td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No Events Found...</p>
    @endif
    @auth
    <a class="btn btn-primary" href="/events/create">Create Event</a>
    @endauth
@endsection