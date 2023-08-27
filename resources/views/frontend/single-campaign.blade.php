@extends('frontend.layout')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="campaign-image">
                    <img src="{{ asset('uploads/campaigns/'.$single_campaign->campaign_image) }}" alt="">
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="container-fluid">
                    <div class="card">
                      <div class="card-body">
                        <div class="campaign-content">
                            <h3>{{ $single_campaign->campaign_title }}</h3>
                            <p style="text-align:justify">{{ $single_campaign->campaign_description }}</p>
                        </div>
                        <div class="campaign-short-des">
                            <h4 class="goal">Campaign Goal: ৳{{ $single_campaign->campaign_goal }}</h4>
                            <h5>Raised Amount: ৳{{ $single_campaign->campaign_raised_amount }}</h5>
                        </div>
                        
                      </div>
                    </div>
                    <div class="donate-btn mt-3">
                        <a href="{{ URL::to('campaign-make-payment/'.$single_campaign->id) }}" class="btn btn-primary btn-donation">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection