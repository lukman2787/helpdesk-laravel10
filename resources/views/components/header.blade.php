<div class="header">
    <div class="header-left">
        <a href="/" class="logo">
            <img src="/img/java_logo.png" width="50" height="50" alt="" />
        </a>
        <a href="/" class="logo2">
            <img src="/img/java_logo.png" width="50" height="50" alt="" />
        </a>
    </div>

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <div class="page-title-box">
        <h3>Jati Vision Raya, CV</h3>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <ul class="nav user-menu">
        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <input class="form-control" type="text" placeholder="Search here" />
                    <button class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </li>
        <?php if (Auth::user()->hasRole(['Super Admin','Admin'])) { ?>
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-cog"></i> <span class="badge rounded-pill"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Application settings</span>
                    <a href="javascript:void(0)" class="clear-noti"></a>
                </div>
                <a href="javascript:void(0);" class="dropdown-item">Company</a>
                <a href="javascript:void(0);" class="dropdown-item">Office Location</a>
                <a href="javascript:void(0);" class="dropdown-item">Role & Permission</a>
            </div>
        </li>
        <?php } ?>
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="badge rounded-pill"></span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        {{-- <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="/img/profiles/avatar-02.jpg" />
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details">
                                            <span class="noti-title">John Doe</span> added new
                                            task
                                            <span class="noti-title">Patient appointment booking</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">4 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>


        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img src="/img/profiles/{{ Auth::user()->user_picture ?? 'user_default.jpg' }}" alt="" />
                    <span class="status online"></span></span>
                @Auth
                    <span>{{ Auth::user()->username }}</span>
                @else
                    <span>Admin</span>
                @endauth
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('employee.show', Auth::user()->id) }}">My Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
    </ul>

    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <a class="dropdown-item" href="index.html">Logout</a>
        </div>
    </div>
</div>
