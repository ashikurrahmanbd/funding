@extends('frontend.layout')

@section('content')

<div class="container">
    <div class="greetings">
        <h3>Your donation has been proccessed successfully. Here is the Donation Summery!</h3>
    </div>
    <div class="invoice-box" id="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('img/main-logo.png') }}" style="width: 80px;height:auto;" />
                            </td>

                            <td>
                                @php
                                    $date = now()->format('d M, Y');
                                @endphp
                                Created at: <?php echo $date; ?><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Help Needy Foundation<br />
                                Sector 10, Uttara<br />
                                Dhaka - 1230, Bangladesh
                            </td>

                            <td>
                                {{ $donation_data['donor_first_name'].' '.$donation_data['donor_last_name'] }}<br />
                                {{ $donation_data['donor_email'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Account Type</td>
            </tr>

            <tr class="details">
                <td>Bkash</td>

                <td>Marchant</td>
            </tr>

            <tr class="heading">
                <td>Donation Description</td>

                <td>Donated Amount</td>
            </tr>

            <tr class="item">
                <td>Website design</td>

                <td>৳{{ $donation_data['donation_amount'] }}</td>
            </tr>

            

            <tr class="total">
                <td></td>

                <td>Total: ৳{{ $donation_data['donation_amount'] }}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="success-action-btn">
                <div class="home-btn">
                    <a href="{{ URL::to('/') }}">Go to Home</a>
                </div>
                {{-- <div class="print-btn">
                    <a href="#" id="print-button">Print Reciept</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
    
@endsection