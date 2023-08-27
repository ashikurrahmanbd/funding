@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Edit Volunteer</h3>
        
        <form action="{{ URL::to('volunteer-edit-form-process/'.$volunteer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="volunteer-name" class="form-label">Volunteer Name</label>
                <input type="text" class="form-control" id="volunteer-name" name="volunteer_name" value="{{ $volunteer->volunteer_name }}" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ $volunteer->designation }}" required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" class="form-control" id="bio" name="bio" value="{{ $volunteer->short_description }}" required>
            </div>

            <div class="mb-3 mt-5">
                <label for="volunteer-image" class="form-label">Volunteer Image</label>
                <input type="file" accept="image/*" class="form-control" id="volunteer-image" name="volunteer_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection