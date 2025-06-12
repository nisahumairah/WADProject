@extends('master.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h4 class="page-title">Fitness Dashboard</h4>

    <!-- Stats Cards Row -->
    <div class="row">
        <!-- Workouts Completed -->
        <div class="col-md-3">
            <div class="card card-stats card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Workouts</p>
                                <h4 class="card-title">24</h4>
                                <small>This Week</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Minutes -->
        <div class="col-md-3">
            <div class="card card-stats card-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Active Minutes</p>
                                <h4 class="card-title">320</h4>
                                <small>Monthly Total</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calories Burned -->
        <div class="col-md-3">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-fire"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Calories</p>
                                <h4 class="card-title">12,450</h4>
                                <small>Burned This Month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Community Engagement -->
        <div class="col-md-3">
            <div class="card card-stats card-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-users"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Community</p>
                                <h4 class="card-title">56</h4>
                                <small>New Connections</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Workout Progress Card -->
    <div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-white border-0 pb-0">
        <h5 class="mb-1"><i class="fas fa-chart-line text-primary me-2"></i>Workout Progress</h5>
        <p class="text-muted small">Weekly completion rate</p>
    </div>
    <div class="card-body pt-0">
        <!-- Strength Training -->
        <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                    <i class="fas fa-dumbbell text-primary me-2"></i>
                    <span class="fw-semibold">Strength Training</span>
                </div>
                <span class="text-primary fw-bold">80%</span>
            </div>
            <div class="progress" style="height: 10px; border-radius: 5px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar-stripes"></div>
                </div>
            </div>
        </div>

        <!-- Cardio -->
        <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                    <i class="fas fa-running text-success me-2"></i>
                    <span class="fw-semibold">Cardio</span>
                </div>
                <span class="text-success fw-bold">65%</span>
            </div>
            <div class="progress" style="height: 10px; border-radius: 5px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar-stripes"></div>
                </div>
            </div>
        </div>

        <!-- Flexibility -->
        <div class="mb-2">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                    <i class="fas fa-spa text-warning me-2"></i>
                    <span class="fw-semibold">Flexibility</span>
                </div>
                <span class="text-warning fw-bold">45%</span>
            </div>
            <div class="progress" style="height: 10px; border-radius: 5px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar-stripes"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Two Column Layout -->
    <div class="row">
        <!-- Recent Activity -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i> Recent Activity</h5>
                    <p class="mb-0 small">Your workout history</p>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Workout</th>
                                    <th class="text-end">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Today</td>
                                    <td>HIIT Circuit</td>
                                    <td class="text-end">
                                        <div class="rating-stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Yesterday</td>
                                    <td>Upper Body Strength</td>
                                    <td class="text-end">
                                        <div class="rating-stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2 days ago</td>
                                    <td>Yoga Flow</td>
                                    <td class="text-end">
                                        <div class="rating-stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Workouts -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i> Upcoming Workouts</h5>
                    <p class="mb-0 small">Your scheduled sessions</p>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <!-- Morning Run -->
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span>Morning Run (5km)</span>
                            <button class="btn btn-sm btn-primary">Start</button>
                        </div>

                        <!-- Strength Training -->
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span>Strength Training - Leg Day</span>
                            <button class="btn btn-sm btn-primary">Start</button>
                        </div>

                        <!-- Yoga -->
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span>Yoga & Stretching</span>
                            <button class="btn btn-sm btn-primary">Start</button>
                        </div>
                    </div>

                    <!-- Add New Workout Button -->
                    <button class="btn btn-outline-primary mt-3 w-100">
                        <i class="fas fa-plus me-2"></i>Add New Workout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Community Highlights -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-users me-2"></i> Community Highlights</h5>
            <p class="mb-0 small">Recent activity from your network</p>
        </div>
        <div class="card-body">
            <!-- Activity Item 1 -->
            <div class="d-flex align-items-start mb-3">
                <div class="flex-shrink-0 me-3">
                    <img src="{{ asset('assets/img/user-icon.png') }}" class="rounded-circle" alt="User">
                </div>
                <div class="flex-grow-1">
                    <p class="mb-1">Alex completed a 10km run in 45 minutes!</p>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="far fa-clock me-1"></i>
                        <span>65 minutes ago</span>
                    </div>
                </div>
            </div>

            <!-- Activity Item 2 -->
            <div class="d-flex align-items-start">
                <div class="flex-shrink-0 me-3">
                    <img src="{{ asset('assets/img/user-icon.png') }}" class="rounded-circle" alt="User">
                </div>
                <div class="flex-grow-1">
                    <p class="mb-1">Sarah shared a new workout: "Full Body Burn"</p>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="far fa-clock me-1"></i>
                        <span>2 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light">
            <a href="#" class="btn btn-sm btn-outline-success w-100">
                <i class="fas fa-list me-1"></i> View All Activity
            </a>
        </div>
    </div>
</div>

<style>
    .progress-wrapper {
        display: flex;
        align-items: center;
    }
    .percentage {
        min-width: 40px;
        text-align: right;
    }
    .rating-stars {
        font-size: 0.9rem;
    }
    .list-group-item {
        border-left: 0;
        border-right: 0;
        padding-left: 0;
        padding-right: 0;
    }
    .list-group-item:first-child {
        border-top: 0;
    }
    .card {
        border-radius: 0.5rem;
    }
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }

    .rounded-circle {
    width: 40px;
    height: 40px;
    object-fit: cover;
    }

    .progress {
        background-color: #f0f2f5;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
    }
    .progress-bar {
        position: relative;
        border-radius: 5px;
        transition: width 0.6s ease;
    }
    .progress-bar-stripes {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: linear-gradient(
            45deg,
            rgba(255, 255, 255, 0.15) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.15) 50%,
            rgba(255, 255, 255, 0.15) 75%,
            transparent 75%,
            transparent
        );
        background-size: 1rem 1rem;
        animation: progress-bar-stripes 1s linear infinite;
    }
    @keyframes progress-bar-stripes {
        0% { background-position-x: 1rem; }
    }

</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
@endsection
