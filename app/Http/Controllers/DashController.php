<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use Carbon\Carbon;

class DashController extends Controller
{   
    // view for unauthorized access
    public function unauthorized_view(){
        return view('backend.unauthorized');
    }


    public function dash_index(){

        $last_5_donations = DB::table('donations')
            ->join('campaigns', 'donations.campaign_id', '=', 'campaigns.id')
            ->select('donations.*', 'campaigns.campaign_title')
            ->orderBy('created_at', 'desc')->take(4)->get();

        $top_donors = DB::table('donations')
        ->select('donor_email', 'donor_first_name', 'donor_last_name', DB::raw('SUM(donation_amount) as total_donated_amount'))
        ->groupBy('donor_email', 'donor_first_name', 'donor_last_name')
        ->orderByDesc('total_donated_amount')
        ->get();

        //this day or today doantion amount
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $currentMonth = Carbon::now()->startOfMonth();

        // Today total amount of doation
        $totalDonationsToday = DB::table('donations')
            ->whereDate('created_at', $today)
            ->sum('donation_amount');

        // yesterday total amount of donation
        $yesterdayTotalDonation = DB::table('donations')
        ->whereDate('created_at', $yesterday)
        ->sum('donation_amount');

        //percentage diff between today and yesterday
        $percentageDifference = 0;
        if ($yesterdayTotalDonation > 0) {
            $todayAndYesterdayDiff = (($totalDonationsToday - $yesterdayTotalDonation) / $yesterdayTotalDonation) * 100;

            $formatted_todayAndYesterdayDiff = number_format($todayAndYesterdayDiff, 2);
        }

        //total donation of this month
        $totalDonationsThisMonth = DB::table('donations')
        ->whereDate('created_at', '>=', $currentMonth)
        ->sum('donation_amount');

        return view('backend.dash-home', ['last_5_donations' => $last_5_donations, 'top_donors' => $top_donors, 'totalDonationsToday' => $totalDonationsToday, 'formatted_todayAndYesterdayDiff' => $formatted_todayAndYesterdayDiff, 'totalDonationsThisMonth' => $totalDonationsThisMonth ]);
    }

    // view for campaign
    public function dash_campaign(){

        $all_campaigns = DB::table('campaigns')->get();

        return view('backend.campaign', ['all_campaigns' => $all_campaigns]);
    }

    // add new campaign form view
    public function dash_campaign_add_new_form(){
        return view('backend.campaign-add-new-form');
    }

    // add new campaign form process
    public function dash_campaign_add_new_form_process(Request $request){

        // process images and then move to uploads folder
        if($request->hasFile('campaign_cover')){

            $image = $request->file('campaign_cover');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/campaigns'), $image_name);


            //all data for new campaign
            $campaign_data = array(
                'campaign_title'    => $request->campaign_title,
                'campaign_description' => $request->campaign_description,
                'campaign_raised_amount'  => $request->already_raised,
                'campaign_goal'    => $request->goal,
                'campaign_image'    => $image_name
            );

            DB::table('campaigns')->insert($campaign_data);
            return redirect('/campaign')->with('campaign_add_success', 'New Campaign Added successfully');
        }



    }

    // Campaign Edit form 
    public function dash_campaign_edit_form($id){

        $campaign = DB::table('campaigns')->where('id', $id)->first();

        return view('backend.campaign-edit-form')->with('campaign', $campaign);
    }


    // campaign edit form process for update single data
    public function dash_campaign_edit_form_process(Request $request, $id){

        // process images and then move to uploads folder
        if($request->hasFile('campaign_cover')){

            $image = $request->file('campaign_cover');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/campaigns'), $image_name);


            //all data for new campaign
            $campaign_data = array(
                'campaign_title'    => $request->campaign_title,
                'campaign_description' => $request->campaign_description,
                'campaign_raised_amount'  => $request->already_raised,
                'campaign_goal'    => $request->goal,
                'campaign_image'    => $image_name
            );

            DB::table('campaigns')->where('id', $id)->update($campaign_data);
            return redirect('/campaign')->with('campaign_update_success', 'Campaign Updated successfully');
        }else{
            //all data for new campaign
            $campaign_data = array(
                'campaign_title'    => $request->campaign_title,
                'campaign_description' => $request->campaign_description,
                'campaign_raised_amount'  => $request->already_raised,
                'campaign_goal'    => $request->goal,
            );

            DB::table('campaigns')->where('id', $id)->update($campaign_data);
            return redirect('/campaign')->with('campaign_update_success', 'Campaign Updated successfully');
        }

    }


    // campaign delete
    public function dash_campaign_delete($id){
        $campaign = DB::table('campaigns')->where('id', $id)->first();


        if($campaign){
            if($campaign->campaign_image){
                $image_file = public_path('uploads/'.$campaign->campaign_image);

                if(File::exists($image_file)){
                    File::delete($image_file);
                }
            }

            DB::table('campaigns')->where('id', $id)->delete();
            return redirect()->back();
        }

    }



}
