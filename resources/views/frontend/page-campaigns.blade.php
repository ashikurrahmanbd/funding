@extends('frontend.layout')

@section('content')

<div class="page-cover">
    <div class="container">
        
        <h2>Cause & CAMPAIGNS</h2>
        
    </div>
</div>

<section class="our_cuauses">
    <h2>All Recent CAMPAIGNS</h2>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
    eiusmod tempor <br />
    incididunt ut labore et dolore magna aliqua.
    </p>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="our_cuauses_single owl-carousel owl-theme">

                    @foreach ($all_campaigns as $campaign)
                    <div class="item">
                        <img src="{{ asset('uploads/campaigns').'/'.$campaign->campaign_image }}" alt="" />
                        <div class="for_padding">
                            <h3 class="campaign-title"> <a href="{{ URL::to('single-campaign/'.$campaign->id) }}">{{ $campaign->campaign_title }}</a> </h3>
                            <p>
                                {{ implode(' ', array_slice(explode(' ', $campaign->campaign_description), 0, 15)) . (str_word_count($campaign->campaign_description) > 15 ? ' ...' : '') }}
                            </p>

                            @php
                                $goal_amount = $campaign->campaign_goal;
                                $raised_amount = $campaign->campaign_raised_amount;
                                $percentage = ($raised_amount / $goal_amount) * 100;

                                $formatted_percentage = number_format($percentage, 0);
                            @endphp

                            <div class="progress-text">
                            <p class="progress-top">{{ $formatted_percentage }}%</p>
                            
                            <div class="progress">
                                <div
                                class="progress-bar"
                                role="progressbar"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="width: {{ $formatted_percentage }}%"
                                ></div>
                            </div>
                            <p class="progress-left">Raised: <span>৳ {{ $campaign->campaign_raised_amount }}</span></p>
                            <p class="progress-right">Goal: <span>৳ {{ $campaign->campaign_goal }}</span></p>
                            </div>
                            <h2 class="borderes"><a href="{{ URL::to('single-campaign/'.$campaign->id) }}">DONATE NOW</a></h2>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    
</section>
    
@endsection