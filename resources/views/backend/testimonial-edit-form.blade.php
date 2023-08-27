@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Edit Testimonial</h3>

        <form action="{{ URL::to('testimonial-edit-form-process/'.$testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="provider-name" class="form-label">Provider Name</label>
                <input type="text" class="form-control" id="provider-name" name="provider_name" value="{{ $testimonial->provider_name }}" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ $testimonial->designation }}" required>
            </div>

            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <input type="text" class="form-control" id="feeback" name="feedback" value="{{ $testimonial->feedback }}" required>
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