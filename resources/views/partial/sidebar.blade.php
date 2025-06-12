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
                </a>
            </li>

            <li class="nav-item {{ request()->is('workouts') ? 'active' : '' }}">
                <a href="{{ route('workouts.index') }}">
                    <i class="la la-table"></i>
                    <p>Workout Tracker</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('nutrition') ? 'active' : '' }}">
                <a href="{{ route('nutrition') }}">
                    <i class="la la-cutlery"></i>
                    <p>Nutrition</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('goals*') ? 'active' : '' }}">
                <a href="{{ route('goals.index') }}">
                    <i class="la la-bullseye"></i>
                    <p>Goals & Progress</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="la la-sun-o"></i>
                    <p>Daily Motivation</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('community*') ? 'active' : '' }}">
                <a href="{{ route('community.index') }}">
                    <i class="la la-users"></i>
                    <p>Community</p>
                </a>
            </li>
        </ul>
    </div>
</div>
