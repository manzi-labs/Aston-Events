@extends('templates.template')

@section('content')
    <h3>Organiser Dashboard</h3>
    <hr>

    <div class="accordion accordion-flush" id="dashboardAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Organiser Details
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#dashboardAccordion">
            <div class="accordion-body">
                {!!Form::open(['action' => ['App\Http\Controllers\DashboardController@update', $organiser->id], 'method' => 'POST']) !!}
                <div class="col-md-6">
                  {{Form::label('name', 'Name')}}
                  {{Form::text('name', $organiser->name, ['class'=> 'form-control', 'placeholder' => 'Name'])}}
              </div>
              <div class="col-md-6">
                  {{Form::label('studentCode', 'Student Code')}}
                  {{Form::textarea('studentCode', $organiser->studentCode, ['class'=> 'form-control', 'placeholder' => '0000'])}}
              </div>
              <div class="col-12">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('update', ['class'=>'btn btn-primary']);}}
                {!!Form::close() !!}
              </div>
            </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Created Events
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#dashboardAccordion">
            <div class="accordion-body">
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
                                {{$event->eventDescription}}
                                <table class="table">
                                    <tr>
                                        <th>                           
                                            <a href="/events/{{$event->id}}/edit" class="btn btn-warning">Edit</a>
                                        </th>
                                        <th>
                                            {!!Form::open(['action' => ['App\Http\Controllers\EventsController@destroy', $event->id], 'method' => 'POST']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close() !!}
                                        </th>
                                    </tr>
                                </table>  
                            </div>
                        </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
        @else
        <p>No Events</p>
        @endif
            </div>
        </div>
      </div>
    
@endsection
