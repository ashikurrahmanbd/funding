@extends('backend.dash')

@section('dash-content')

<!--  Row 1 -->
<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div
            class="d-sm-flex d-block align-items-center justify-content-between mb-9"
          >
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Donation Overview</h5>
            </div>
            <div>
              <select class="form-select">
                <option value="1">March 2023</option>
                <option value="2">April 2023</option>
                <option value="3">May 2023</option>
                <option value="4">June 2023</option>
              </select>
            </div>
          </div>
          <div id="chart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title mb-9 fw-semibold">
                Raised Today
              </h5>
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="fw-semibold mb-3">৳{{ $totalDonationsToday }}</h4>
                  <div class="d-flex align-items-center mb-3">
                    <span
                      class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center"
                    >
                      <i class="ti ti-arrow-up-left text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">{{ $formatted_todayAndYesterdayDiff }}%</p>
                    <p class="fs-3 mb-0">from Yesterday</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="me-4">
                      <span
                        class="round-8 bg-primary rounded-circle me-2 d-inline-block"
                      ></span>
                      <span class="fs-2">2023</span>
                    </div>
                    <div>
                      <span
                        class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"
                      ></span>
                      <span class="fs-2">2023</span>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-center">
                    <div id="breakup"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- Monthly Earnings -->
          <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold">
                    This Month
                  </h5>
                  <h4 class="fw-semibold mb-3">৳{{ $totalDonationsThisMonth }}</h4>
                  <div class="d-flex align-items-center pb-1">
                    <span
                      class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center"
                    >
                      <i class="ti ti-arrow-down-right text-danger"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0"> -10%</p>
                    <p class="fs-3 mb-0">from Last Month</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center"
                    >
                      <i class="ti ti-currency-dollar fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="earning"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end of first row --}}

  {{-- start second row --}}

  <div class="row">


    <div class="col-lg-5 d-flex align-items-stretch">
      <div class="card w-100 recent-donation-card">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Recent Donations</h5>
          </div>

          <ul class="timeline-widget mb-0 position-relative mb-n5">

            @foreach ($last_5_donations as $donation)
            <li class="timeline-item d-flex position-relative overflow-hidden">
            <div class="timeline-time text-dark flex-shrink-0 text-end">
              {{ $donation->created_at }}
            </div>
            <div
              class="timeline-badge-wrap d-flex flex-column align-items-center">
              <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
              <span class="timeline-badge-border d-block flex-shrink-0"></span>
            </div>
            <div class="timeline-desc fs-3 text-dark mt-n1">
              Donation received from <b>{{ $donation->donor_first_name.' '.$donation->donor_last_name }}</b> of ৳{{ $donation->donation_amount }} to {{ $donation->campaign_title }}
            </div>
            </li>
            @endforeach


          </ul>
        </div>
      </div>
    </div>


    <div class="col-lg-7 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">
            Top Donors
          </h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">

              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">SL</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Donor Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Donor Email</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Amount</h6>
                  </th>
                </tr>
              </thead>

              <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($top_donors as $donor)
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ $i++ }}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $donor->donor_first_name }}</h6>
              
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $donor->donor_email }}</p>
                  </td>
                  
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">৳{{ $donor->total_donated_amount }}</h6>
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End of second row --}}

@endsection