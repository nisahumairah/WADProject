@extends('layouts.master') {{-- or whatever layout your dashboard uses --}}

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-4 d-flex justify-content-between align-items-center">
            <h4 class="text-white fw-bold">Nutrition Overview</h4>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-12 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Protein</p>
                                    <h4 class="card-title">65g / 120g</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Add more cards here if needed --}}
        </div>
    </div>
</div>
@endsection
