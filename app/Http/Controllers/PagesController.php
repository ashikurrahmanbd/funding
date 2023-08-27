<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PagesController extends Controller
{
    
    // campaigns page view
    public function campaigns_page_view(){

        $all_campaigns = DB::table('campaigns')->get();
  
        return view('frontend.page-campaigns', ['all_campaigns' => $all_campaigns]);
    }

    //events page view
    public function events_page_view(){
        $all_events = DB::table('events')->get();
  
        return view('frontend.page-events', ['all_events' => $all_events]); 
    }

    //contact page view
    public function contact_page_view(){
        return view('frontend.page-contact');
    }

    //about page view
    public function about_page_view(){
        return view('frontend.page-about');
    }

}
