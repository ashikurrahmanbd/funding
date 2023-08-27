@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Add New Event</h3>

        <form action="{{ route('dashboard.events.addnew.form.proces') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="event-title" class="form-label">event Title</label>
                <input type="text" class="form-control" id="event-title" name="event_title" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            <div class="mb-3">
                <label for="event-description" class="form-label">event Description</label><br/>
                <textarea name="event_description" class="form-control" id="event-description" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3">
                <label for="event-location" class="form-label">event Locatoin</label>
                <input type="text" class="form-control" id="event-location" name="event_location" required>
            </div>

            <div class="mb-3">
                <label for="event-end-date" class="form-label">event Time</label>
                <input type="text" class="form-control" id="event-end-date" name="event_time" required>
            </div>

            <div class="mb-3">
                <label for="event-cover" class="form-label">event Cover image</label>
                <input type="file" class="form-control" id="event-cover" accept="image/*" name="event_cover" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection