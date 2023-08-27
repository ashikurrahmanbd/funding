@extends('frontend.layout')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                @if (Session::has('Donation_amount_exceed'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('Donation_amount_exceed') }}
                </div>
                @endif

                <h5 class="mb-3">Make Donation</h5>
                <form action="{{ URL::to('bkash-make-payment/'.$campaign_id) }}" method="post">
                    @csrf
                    
                    <div class="donation-amount">
                        <label for="">Donation amount</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">৳</span>
                            <input type="number" class="form-control" placeholder="Donation amount" aria-label="Username" aria-describedby="basic-addon1" name="donation_amount" required>
                        </div>
                    </div>
                    <div class="donar-info">
                        <div class="row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="donor_first_name" pattern="[A-Za-z]+" title="Please enter letters only" required>
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="donor_last_name" pattern="[A-Za-z]+" title="Please enter letters only" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:15px;">
                            <div class="col">
                              <input type="email" class="form-control" placeholder="Email" aria-label="First name" name="donor_email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <input type="hidden" class="form-control" name="campaign_id" value="{{ $campaign_id }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="payment-btn text-center">
                        <button type="submit" class="bkash-btn">Pay With Bkash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection