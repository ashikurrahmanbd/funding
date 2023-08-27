@extends('frontend.layout')

@section('content')

<div class="page-cover">
    <div class="container">
        
        <h1>EVENTS</h1>
        
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


    
@endsection