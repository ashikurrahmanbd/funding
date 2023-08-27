@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">

        @if (Session::has('testimonials_add_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('testimonials_add_success') }}
        </div>
        @endif

        @if (Session::has('testimonials_update_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('testimonials_update_success') }}
        </div>
        @endif

        <div class="campaign-card-top">
            <h5 class="card-title fw-semibold mb-4">Testimonials</h5>
            
            <!-- Button trigger modal -->
            <a href="{{ route('dash.testimonial.add.new.form') }}" type="button" class="btn btn-primary">
                Add New Testimonials
            </a>

        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Provider Name</th>
              <th scope="col">Designation</th>
              <th scope="col">Feedback</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
            @php
                $i = 1;
            @endphp
            @foreach ($testimonials as $testimonial)
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td>{{ $testimonial->provider_name }}</td>
              <td>{{ $testimonial->designation }}</td>
              <td>{{ $testimonial->feedback }}</td>
              <td> <a href="{{ URL::to('testimonial-edit-form/'.$testimonial->id) }}">Edit</a> || <a href="{{ URL::to('testimonial-delete/'. $testimonial->id) }}" onclick="return confirm('Are you sure to Delete')">Delete</a></td>
            </tr> 
            @endforeach
            
          </tbody>
      </table>
       
      </div>
    </div>
</div>
@endsection