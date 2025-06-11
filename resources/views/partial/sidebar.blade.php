@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                {{-- Default placeholder image --}}
                <img src="{{ asset('assets/img/user-icon.png') }}" alt="User Avatar">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hi! {{ $user->name ?? 'Guest' }}
                        <span class="user-level">Sport Enthusiast</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('profile') }}">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    {{-- <span class="badge badge-count">5</span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-heartbeat"></i>
                    <p>Workout</p>
                    {{-- <span class="badge badge-count">14</span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-apple"></i>
                    <p>Nutrition</p>
                    {{-- <span class="badge badge-count">50</span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-bullseye"></i>
                    <p>Goals & Progress</p>
                    {{-- <span class="badge badge-count">6</span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-sun-o"></i>
                    <p>Daily Motivation</p>
                    {{-- <span class="badge badge-success">3</span> --}}
                </a>
            </li>
            <li class="nav-item {{ request()->is('community*') ? 'active' : '' }}">
                <a href="{{ route('community.index') }}">
                    <i class="la la-users"></i>
                    <p>Community</p>
                    {{-- <span class="badge badge-danger">25</span> --}}
                </a>
            </li>
        </ul>
    </div>
</div>
