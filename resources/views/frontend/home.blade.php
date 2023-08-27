@extends('frontend.layout')

@section('content')
    {{-- sectoin content --}}

    <section class="carosal-area">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="client owl-carousel owl-theme">

                @foreach ($all_campaigns as $campaign)
                <div class="item">
                    <div class="text">
                        <h3>{{ $campaign->campaign_title }}</h3>
                        <p>
                            {{ implode(' ', array_slice(explode(' ', $campaign->campaign_description), 0, 80)) . (str_word_count($campaign->campaign_description) > 80 ? ' ...' : '') }}
                        </p>
                        <h5 class="white-button"><a href="{{ URL::to('single-campaign/'.$campaign->id) }}">DONATE NOW</a></h5>
                        <h5><a href="{{ URL::to('/page-contact') }}">CONTACT US</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        </div>
    </section>
    <section class="our_activity">
        <h2>OUR ACTIVITY</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
        eiusmod tempor <br />
        incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
            <div class="single-Promo">
                <div class="promo-icon">
                <i class="material-icons">near_me</i>
                </div>
                <h2><a href="#">Fundraising</a></h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis
                </p>
            </div>
            </div>
            <div class="col-md-4 col-xs-12">
            <div class="single-Promo">
                <div class="promo-icon">
                <i class="material-icons">favorite</i>
                </div>
                <h2><a href="#">Volunteering</a></h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis
                </p>
            </div>
            </div>
            <div class="col-md-4 col-xs-12">
            <div class="single-Promo">
                <div class="promo-icon">
                <i class="material-icons">dashboard</i>
                </div>
                <h2><a href="#">Social Development</a></h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis
                </p>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="donate_section">
        <div class="container">
        <div class="row">
            <div class="col-md-12 for-padding">
            <h4>URGENT CAUSE</h4>
            <h3>Recent Environmental Disasters</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.
            </p>
            <div class="progress-text">
                <p class="progress-top">50%</p>
                <div class="progress">
                <div
                    class="progress-bar"
                    role="progressbar"
                    aria-valuenow="70"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 50%"
                ></div>
                </div>
                <p class="progress-left">Raised: $1200</p>
                <p class="progress-right">Goal: $2400</p>
            </div>
            <h2><a href="#">DONATE NOW</a></h2>
            </div>
        </div>
        </div>
    </section>

    <section class="our_cuauses">
        <h2>CAMPAIGNS</h2>
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


    <div class="block-wrapper">
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
            <div class="block">
                <p><i class="material-icons">favorite</i></p>
                <p class="counter-wrapper"><span class="fb"></span></p>
                <p class="text-block">CAUSES</p>
            </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
            <div class="block">
                <p><i class="material-icons">language</i></p>
                <p class="counter-wrapper"><span class="code"></span></p>
                <p class="text-block">PLACES</p>
            </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
            <div class="block">
                <p><i class="material-icons">person_add</i></p>
                <p class="counter-wrapper"><span class="bike"></span></p>
                <p class="text-block">VOLUNTEERS</p>
            </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 for-border">
            <div class="block">
                <p><i class="material-icons">people</i></p>
                <p class="counter-wrapper"><span class="coffee"></span></p>
                <p class="text-block">SAVED</p>
            </div>
            </div>
        </div>
        </div>
    </div>


    <section class="events_section_area">
        <h2>UPCOMING EVENTS</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
        eiusmod tempor <br />
        incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="container">
            <div class="row">

                @foreach ($all_events as $event)
                <div class="col-md-4 col-xs-12">
                    <div class="events_single">
                        <img src="{{ asset('uploads/events/'.$event->event_cover_image) }}" alt="" />
                        <p>
                        <span class="event_left"
                            ><i class="fa fa-clock-o"></i>{{ $event->event_time }}</span
                        ><span class="event_right"
                            ><i class="fa fa-map-marker"></i>{{ $event->event_location }}</span
                        >
                        </p>
                        <div class="clear"></div>
                        <h3>{{ $event->event_title }}</h3>
                        <h6>

                            {{ implode(' ', array_slice(explode(' ', $event->event_description), 0, 22)) . (str_word_count($event->event_description) > 25 ? ' ...' : '') }}

                        </h6>
                    </div>
                </div>  
                @endforeach

            </div>
        </div>
    </section>


    <div class="clear"></div>
    <section class="volunteer_area">
        <h2>Our Volunteer</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
        eiusmod tempor <br />
        incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="container">
             
            <div class="volunteer_single owl-carousel owl-theme">
                
            </div>

        </div>



        
        {{-- start voluntter --}}

        <div class="container pb-5">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

                @foreach ($volunteers as $volunteer)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="text-center">
               
    
                            <div class="img-hover-zoom img-hover-zoom--colorize">
                                <img class="shadow v-image" src="{{ asset('uploads/volunteers/'.$volunteer->volunteer_image) }}"
                                    alt="Another Image zoom-on-hover effect">
                            </div>
    
                        </div>
               
                        <div class="card-body">
                            <div class="clearfix mb-3">
    
    
             
    
                            </div>
    
    
                            <div class="my-2 text-center">
    
                                <h1>{{ $volunteer->volunteer_name }}</h1>
    
                            </div>
                            <div class="mb-3">
    
                                <h2 class="text-uppercase text-center role">{{ $volunteer->designation }}</h2>
    
                            </div>
                            <div class="box">
                                <div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> <a href="#"><i class="fa fa-github"></i></a> </li>
                                        <li class="list-inline-item"> <a href="#"><i class="fa fa-linkedin"></i></a> </li>
                                        <li class="list-inline-item"> <a href="#"><i class="fa fa-instagram"></i></a> </li>
                                        <li class="list-inline-item"> <a href="#"><i class="fa fa-twitter"></i></a> </li>
                                    </ul>
    
                                </div>
                            </div>
    
            
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    
    
    

        {{-- end volunteer --}}



    </section>

    <section class="carosal_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carosal_bottom_single owl-carousel owl-theme">

                        @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <img src="{{ asset('uploads/testimonials/'.$testimonial->provider_image) }}" alt="" class="testimonial-image" />
                            <p>
                                {{ $testimonial->feedback }}
                            </p>
                            <h5><i class="material-icons">format_quote</i></h5>
                            <h4>{{ $testimonial->provider_name }}</h4>
                            <h6>{{ $testimonial->designation }}</h6>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="letast_news">
        <h2>latest news</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
        eiusmod tempor <br />
        incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="container">
        <div class="row">


            @foreach ($all_news as $single_news)
            <div class="col-md-4">
                <div class="single_news">
                    <img src="{{ asset('uploads/news/'.$single_news->thumbnail) }}" alt="" />
                    <div class="texts">
                    <p class="date" style="text-align: center"><a href="#">30 May, 2023</a></p>
                    <h3 style="text-align: center; margin-bottom:10px;">
                       {{ $single_news->title }}
                    </h3>
                    <p class="test">
                        {{ $single_news->description }}
                    </p>
                    <h3 style="text-align: center"><a href="#">READ MORE</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
        </div>
    </section>
@endsection