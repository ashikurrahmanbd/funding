@extends('frontend.layout')

@section('content')
    <div class="container text-center">
        <h3>You don't have enough permission to access this page. Please login first to access</h3>
        <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
    </div>
@endsection