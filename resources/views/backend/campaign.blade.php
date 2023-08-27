@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">

        @if (Session::has('campaign_add_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('campaign_add_success') }}
            </div>
        @endif
        
        @if (Session::has('campaign_update_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('campaign_update_success') }}
            </div>
        @endif
        

        <div class="campaign-card-top">
            <h5 class="card-title fw-semibold mb-4">Campaign</h5>
            
            <!-- Button trigger modal -->
            <a href="{{ route('campaign.addnew') }}" type="button" class="btn btn-primary">
                Add New Campaign
            </a>
  


        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Campaign Name</th>
                <th scope="col">Total Raised</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;    
                @endphp
                @foreach ($all_campaigns as $campaign)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $campaign->campaign_title }}</td>
                    <td>৳ {{ $campaign->campaign_raised_amount }}</td>
                    <td>
                        <span> <a href="{{ URL::to('campaign-edit-form/'.$campaign->id) }}">Edit</a> | <a href="{{ URL::to('campaign-delete/'.$campaign->id) }}" onclick="return confirm('Are you sure to delete this data?')">Delete</a></span>
                    </td>
                </tr>
                @endforeach
                

              
              
            </tbody>
        </table>
      </div>
    </div>
</div>
@endsection