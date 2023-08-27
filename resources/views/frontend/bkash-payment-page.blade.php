@extends('frontend.layout')
@section('content')

<div class="container mt-5 bkash-payment-modal">
    <div class="row">
        
        <div class="col-md-5 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                  <img src="{{ asset('img/bkash/bkash_payment_logo.png') }}" alt="" class="img-fluid">
                </div>
                <div class="card-body">
                  <div class="marchant-payment-info">
                    <div class="marchant-cart-info">
                        <div class="cart-icon">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="marchant-info">
                            <p>BkashSandboxMarchant</p>
                            <h6>campaign ID: {{ $donation_data['campaign_id'] }}</h6>
                        </div>
                    </div>
                    <div class="payment-info">
                        <h4>৳ {{ $donation_data['donation_amount'] }}</h4>
                    </div>
                  </div>
                  
                </div>

                <div class="bkash-payment-form pt-5">
                    <form action="{{ route('bkash-payment-process') }}" method="POST" id="bkash-payment-form">
                        @csrf
                        <p>Your Bkash Account Number</p>
                        <div class="all-hidden-inputs-of-donation-form">
                            <input type="hidden" name="donation_amount" value="{{ $donation_data['donation_amount'] }}">
                            <input type="hidden" name="donor_first_name" value="{{ $donation_data['donor_first_name'] }}">
                            <input type="hidden" name="donor_last_name" value="{{ $donation_data['donor_last_name'] }}">
                            <input type="hidden" name="donor_email" value="{{ $donation_data['donor_email'] }}">
                            <input type="hidden" name="campaign_id" value="{{ $donation_data['campaign_id'] }}">
                            <input type="hidden" name="campaign_raised_amount" value="{{ $donation_data['campaign_already_raised_amount'] }}">

                        </div>
                        <div class="form-inputs">
                            <div class="phone">
                                <input type="text" class="form-control text-center" name="bkash_phone" id="bkash_phone" placeholder="e.g 01XXXXXXXXX" required>
                                <p style="font-size: 12px;">By clicking on <span style="font-weight: bold">Confirm</span>, you are agreeing to the <a href="https://cdn.mapp.bka.sh/english.html" style="margin-top:8px; display:inline-block; text-decoration:none; color: #fff; font-weight:bold">terms & conditions</a></p>
                            </div>

                            <div class="bkash-pin">
                                <input type="password" name="bkash_pin" id="bkash-pin" class="form-control text-center" placeholder="Bkash PIN" required>
                            </div>
                            <div class="bkash-otp">
                                <input type="text" name="bkash_otp" id="bkash-otp" class="form-control text-center" placeholder="OTP" required>
                            </div>

                            <div class="error-message">
                                <p class="bkash-error-message alert" style="margin-top:10px; display:none"></p>
                            </div>

                            
                        </div>

                        {{-- confirm form submit --}}
                        <div class="bkash-close-confirm">
                            <div class="bkash-close">
                                <a href="#">CLOSE</a>
                            </div>
                            <div class="bkash-confirm">
                                <a href="#" class="fist-submit">SUBMIT</a>
                                <button type="submit" class="second-confirm">CONFIRM</button>
                                
                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-muted">
                  <i class="fa fa-phone-square"></i><span>16247</span>
                </div>
            </div>
        </div>
    </div>

    
</div>
    
@endsection