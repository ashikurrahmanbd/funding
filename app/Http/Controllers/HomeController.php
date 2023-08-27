<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    //index
    public function index(){

        $all_campaigns = DB::table('campaigns')->get();
        $all_events = DB::table('events')->get();
        $volunteers = DB::table('volunteers')->get();
        $testimonials = DB::table('testimonials')->get();
        $all_news = DB::table('latest_news')->get();


        return view('frontend.home', ['all_campaigns' => $all_campaigns, 'all_events' => $all_events, 'volunteers' => $volunteers, 'testimonials' => $testimonials, 'all_news' => $all_news]);
    }


    // single campaign details
    public function single_campaign_details($id){
        $single_campaign = DB::table('campaigns')->where('id', $id)->first();
        return view('frontend.single-campaign')->with('single_campaign', $single_campaign);
    }

}
