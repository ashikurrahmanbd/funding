@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Add New Testimonial</h3>

        <form action="{{ route('testmonial-add-new') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="provider-name" class="form-label">Provider Name</label>
                <input type="text" class="form-control" id="provider-name" name="provider_name" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>

            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <input type="text" class="form-control" id="feeback" name="feedback" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            

            <div class="mb-3">
                <label for="provider-image" class="form-label">Provider Image</label>
                <input type="file" class="form-control" id="provider-image" accept="image/*" name="provider_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection