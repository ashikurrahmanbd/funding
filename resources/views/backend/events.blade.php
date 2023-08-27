@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if (Session::has('event_add_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('event_add_success') }}
            </div>
        @endif

        @if (Session::has('event_update_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('event_update_success') }}
            </div>
        @endif

        
        <div class="campaign-card-top">


            <h5 class="card-title fw-semibold mb-4">Events</h5>
            
            <!-- Button trigger modal -->
            <a href="{{ route('dashboard.events.addnew.form') }}" type="button" class="btn btn-primary">
                Add New Event
            </a>

        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Event Title</th>
              <th scope="col">Event Time</th>
              <th scope="col">Location</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i = 1;    
            @endphp
            @foreach ($events as $event)
              <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $event->event_title }}</td>
                  <td>{{ $event->event_time }}</td>
                  <td>{{ $event->event_location }}</td>
                  <td> <a href="{{ URL::to('event-edit/'. $event->id) }}">Edit</a> || <a href="{{ URL::to('event-delete/'.$event->id) }}" onclick="return confirm('Are you sure to Delete')">Delete</a></td>

              </tr>
            @endforeach

             
            
          </tbody>
      </table>
       
      </div>
    </div>
</div>
@endsection