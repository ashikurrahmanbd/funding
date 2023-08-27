@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
       
        <div class="campaign-card-top">

            <h5 class="card-title fw-semibold mb-4">Users</h5>

        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User Name</th>
              <th scope="col">User Email</th>
              <th scope="col">Role</th>
              
            </tr>
          </thead>
          <tbody>
            @php
            $i = 1;    
            @endphp

            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
               

            </tr>
            @endforeach

          </tbody>
      </table>
       
      </div>
    </div>
</div>
@endsection