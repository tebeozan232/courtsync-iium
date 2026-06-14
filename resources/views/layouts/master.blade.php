<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourtSync IIUM</title>

    <!-- Mazer CSS (Ensure these files are in your public/assets folder) -->
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/icon-ly.css') }}">
    
    <!-- Custom CourtSync Emerald Green CSS -->
    <style>
        .sidebar-wrapper .menu .sidebar-item.active > .sidebar-link {
            background-color: #10b981 !important; /* Emerald Green */
        }
        .stats-icon.emerald {
            background-color: #10b981;
        }
        .btn-primary, .btn-success {
            background-color: #10b981 !important;
            border-color: #10b981 !important;
        }
        .stats-icon.emerald {
            background-color: #10b981 !important;
        }
        .stats-icon i {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- SIDEBAR SECTION -->
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="/" style="font-size: 1.2rem; color: #10b981; font-weight: bold;">CourtSync IIUM</a>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i><span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('facilities*') ? 'active' : '' }}">
                            <a href="/facilities" class='sidebar-link'>
                                <i class="bi bi-building-fill"></i><span>Facilities</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('my-bookings') ? 'active' : '' }}">
                            <a href="/my-bookings" class='sidebar-link'>
                                <i class="bi bi-calendar-check-fill"></i><span>My Bookings</span>
                                <!-- Check if the logged-in user is an admin -->
                               <!-- Admin-Only Section Start -->
                                @if(Auth::user() && Auth::user()->role == 'admin')
                                    <li class="sidebar-title">Admin Controls</li>

                                    <li class="sidebar-item {{ request()->is('admin/facilities*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.facilities.index') }}" class='sidebar-link'>
                                            <i class="bi bi-tools" style="color: #10b981;"></i> <!-- Emerald Icon -->
                                            <span>Manage Facilities</span>
                                        </a>
                                    </li>
    
                                    <li class="sidebar-item">
                                        <a href="#" class='sidebar-link'>
                                            <i class="bi bi-people-fill"></i>
                                             <span>Manage Students</span>
                                        </a>
                                        </li>
                                @endif
                                <!-- Admin-Only Section End -->
                            </a>
                        </li>

                        <li class="sidebar-title">Account</li>

                        <li class="sidebar-item">
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a href="#" class='sidebar-link text-danger' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-left text-danger"></i><span>Logout</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT SECTION -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2026 &copy; CourtSync IIUM - Web App Development Project</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Mazer Scripts -->
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
</body>

</html>