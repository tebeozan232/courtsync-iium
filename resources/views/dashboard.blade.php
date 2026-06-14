@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Dashboard Statistics</h3>
</div>

<div class="page-content">
    <!-- 1. STAT CARDS SECTION -->
    <div class="row">
        <!-- Card 1: Total Bookings -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon emerald mb-2"><i class="bi bi-calendar-check-fill text-white"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Bookings</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalBookings }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Upcoming -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2"><i class="bi bi-clock-fill text-white"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Upcoming</h6>
                            <h6 class="font-extrabold mb-0">{{ $upcomingBookings }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Completed -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2"><i class="bi bi-check-circle-fill text-white"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Completed</h6>
                            <h6 class="font-extrabold mb-0">{{ $completedBookings }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Active Courts -->
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2"><i class="bi bi-geo-alt-fill text-white"></i></div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Active Courts</h6>
                            <h6 class="font-extrabold mb-0">{{ $activeCourts }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. ROLE-AWARE WELCOME SECTION -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm border-0" style="background-color: #f0fdf4; border-left: 5px solid #10b981 !important;">
                <div class="card-body py-4">
                    @if(Auth::user()->role == 'admin')
                        <div class="card shadow-lg border-0" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl me-3">
                                        <i class="bi bi-shield-check" style="font-size: 3rem;"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white">Admin Control Panel</h3>
                                        <p>Welcome, Staff. System status is <strong>Healthy</strong>. You have 3 pending tasks.</p>
                                    </div>
                                </div>

                        <!-- THE MAIN ACCESS BUTTON -->
                        <div class="mt-3">
                            <a href="{{ route('admin.facilities.index') }}" class="btn btn-white text-success fw-bold rounded-pill px-4 shadow">
                                <i class="bi bi-plus-circle-fill me-2"></i> Manage & Add Facilities
                            </a>
                            <button class="btn btn-outline-white rounded-pill px-4 ms-2">View Reports</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
                </div>
            </div>
        </div>
    </div>

    <!-- 3. RECENT ACTIVITY TABLE -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Recent Activity</h4>
                    <a href="/my-bookings" class="btn btn-light-secondary btn-sm">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Venue</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentBookings as $rb)
                                <tr>
                                    <td>{{ $rb->facility->name }}</td>
                                    <td>{{ $rb->booking_date }}</td>
                                    <td>{{ $rb->start_time }} - {{ $rb->end_time }}</td>
                                    <td><span class="badge bg-light-success text-success">Confirmed</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recent bookings.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection