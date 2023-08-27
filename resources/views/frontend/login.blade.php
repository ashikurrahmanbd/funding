@extends('frontend.layout')
@section('content')
    <section class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            @if (Auth::check())
                                You are already Logged In
                            @else
                                Login
                            @endif
                        </h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        
                        {{-- session check for logged out --}}
                        @if (Session::has('logout-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('logout-success') }}
                            </div>
                        @endif

                        @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                        @else
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Passwrod" required>
                            </div>

                            <div class="mb-3">
                                <div class="d-grid">
                                    <button class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection