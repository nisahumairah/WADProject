@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-inner">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="fw-bold mb-0">Dashboard</h3>
      <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
    </div>
  </div>

  <!-- Stats Cards Row -->
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <div class="col col-stats">
              <div class="numbers">
                <p class="card-category">Today's Income</p>
                <h4 class="card-title">$170</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Repeat for other 3 stats cards -->
  </div>

  <!-- Charts Row -->
  <div class="row">
    <div class="col-md-8">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-title">User Statistics</div>
          <div class="card-tools">
            <button class="btn btn-info btn-sm">Export</button>
            <button class="btn btn-info btn-sm">Print</button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="statisticsChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
