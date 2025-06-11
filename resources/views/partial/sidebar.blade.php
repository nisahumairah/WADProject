<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('workouts') ? 'active' : '' }}">
                <a href="{{ route('workouts.index') }}">
                    <i class="la la-table"></i>
                    <p>Workout Tracker</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-table"></i>
                    <p>Components</p>
                    <span class="badge badge-count">14</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-keyboard-o"></i>
                    <p>Forms</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-th"></i>
                    <p>Tables</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-bell"></i>
                    <p>Notifications</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-font"></i>
                    <p>Typography</p>
                    <span class="badge badge-danger">25</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-fonticons"></i>
                    <p>Icons</p>
                </a>
            </li>
        </ul>
    </div>
</div>
