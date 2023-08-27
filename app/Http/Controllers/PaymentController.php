<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PaymentController extends Controller
{
    //initial view of payment page
    public function campaign_payment($campaign_id){
        return view('frontend.campaign-payment', ['campaign_id' => $campaign_id]);
    }

    // Bkash make payment
    public function bkash_make_payment(Request $request, $campaign_id){

        $campaign_raised_amount = DB::table('campaigns')->where('id', $campaign_id)->pluck('campaign_raised_amount')->first();

        $campaign_goal_amount = DB::table('campaigns')->where('id', $campaign_id)->pluck('campaign_goal')->first();

        $campaign_submitted_amount = $request->donation_amount;

        $permitable_amount = ($campaign_goal_amount - $campaign_raised_amount);

        if($campaign_submitted_amount <= $permitable_amount){

            $donation_data = array(
                'campaign_id' => $campaign_id,
                'donation_amount'   => $request->donation_amount,
                'donor_first_name'  => $request->donor_first_name,
                'donor_last_name'   => $request->donor_last_name,
                'donor_email'       => $request->donor_email,
                'campaign_already_raised_amount' => $campaign_raised_amount,
    
    
            );

            return view('frontend.bkash-payment-page', ['donation_data' => $donation_data]);

        }else{
            return redirect()->back()->with('Donation_amount_exceed', 'Your Submitted amount is crosing the Total Goal try to submit equal or less than the total campaign Goal. You can make Donation up to '.$permitable_amount.' Taka for this Campaign');
        }

        
    }


    public function bkash_payment_process(Request $request){


        //check previous raised amount and check if the amount cross the goal or not
        $already_raised_amount = DB::table('campaigns')->where('id', $request->campaign_id)->pluck('campaign_raised_amount')->first();

        $campaign_total_goal = DB::table('campaigns')->where('id', $request->campaign_id)->pluck('campaign_goal')->first();

        $updated_raised_amount = $already_raised_amount + $request->donation_amount;

         //Now first step update campaign Raise amount
        $updated_campaign_raised_amount = DB::table('campaigns')->where('id', $request->campaign_id)->update(['campaign_raised_amount' => $updated_raised_amount]);

        if($updated_campaign_raised_amount){
            


            // all donation info
            $donation_data = array(
                
                'campaign_id' => $request->campaign_id,
                'donation_amount'   => $request->donation_amount,
                'donor_first_name'  => $request->donor_first_name,
                'donor_last_name'   => $request->donor_last_name,
                'donor_email'       => $request->donor_email,
                'created_at'        => now(),
                'updated_at'        => now(),


            );

            $donation_inserted = DB::table('donations')->insert($donation_data);

            if($donation_inserted){
                return view('frontend.donation-success', ['donation_data' => $donation_data]);
            }

            
        }


        
    }

}
