@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if (Session::has('volunteers_add_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('volunteers_add_success') }}
            </div>
        @endif
        @if (Session::has('volunteer_update_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('volunteer_update_success') }}
            </div>
        @endif

  
        <div class="campaign-card-top">
            <h5 class="card-title fw-semibold mb-4">Volunteers</h5>
            
            <!-- Button trigger modal -->
            <a href="{{ route('dash.volunteer.add.new.form') }}" type="button" class="btn btn-primary">
                Add New Volunteer
            </a>

        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Volunteer Name</th>
              <th scope="col">Designation</th>
              <th scope="col">Bio</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           @php
               $i = 1;
           @endphp
            @foreach ($volunteers as $volunteer)
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td>{{ $volunteer->volunteer_name }}</td>
              <td>{{ $volunteer->designation }}</td>
              <td>{{ $volunteer->short_description }}</td>
              <td> <a href="{{ URL::to('volunteer-edit-form/'.$volunteer->id) }}">Edit</a> || <a href="{{ URL::to('volunteer-delete/'.$volunteer->id) }}" onclick="return confirm('Are you sure to Delete')">Delete</a></td>
          </tr> 
            @endforeach
              
          </tbody>
      </table>
       
      </div>
    </div>
</div>
@endsection