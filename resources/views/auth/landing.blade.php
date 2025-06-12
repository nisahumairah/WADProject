@extends('master.guest')

@section('title', 'Welcome to FitMuslim GO')

@section('content')
<div class="text-center my-5">
    <h1 class="display-4 fw-bold">Welcome to <span class="text-primary">FitMuslim GO</span></h1>
    <p class="lead">Share workouts, join discussions, and connect with the fitness community.</p>
    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
    </div>
</div>

<hr class="my-5">

<div class="row text-center">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <i class="la la-dumbbell la-3x text-primary mb-3"></i>
                <h5 class="card-title">Share Workouts</h5>
                <p class="card-text">Post your workouts and inspire others on their fitness journey.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <i class="la la-comments la-3x text-success mb-3"></i>
                <h5 class="card-title">Join Discussions</h5>
                <p class="card-text">Engage in health, nutrition, and training conversations.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <i class="la la-users la-3x text-warning mb-3"></i>
                <h5 class="card-title">Build Community</h5>
                <p class="card-text">Connect with like-minded fitness enthusiasts around the world.</p>
            </div>
        </div>
    </div>
</div>
@endsection
