@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Add New Volunteer</h3>

        <form action="{{ route('dash.volunteer.add.new.form.process') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="volunteer-name" class="form-label">Volunteer Name</label>
                <input type="text" class="form-control" id="volunteer-name" name="volunteer_name" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" class="form-control" id="designation" name="bio" required>
            </div>

            <div class="mb-3 mt-5">
                <label for="volunteer-image" class="form-label">Volunteer Image</label>
                <input type="file" class="form-control" accept="image/*" id="volunteer-image" name="volunteer_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection