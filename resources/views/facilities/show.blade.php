@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Venue Details: {{ $facility->name }}</h3>
</div>

<div class="row">
    <!-- Left Side: Details -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <img src="https://via.placeholder.com/800x400?text={{ $facility->name }}" class="img-fluid rounded mb-4" alt="Venue Image">
                <h4>Information</h4>
                <p><strong>Location:</strong> {{ $facility->location }}</p>
                <p><strong>Category:</strong> {{ $facility->category }}</p>
                <p><strong>Description:</strong> This is a world-class facility at IIUM, equipped with modern amenities and suitable for recreational and competitive play.</p>
                
                <hr>
                
                <!-- THE TIMETABLE -->
                <h4 class="mt-4"><i class="bi bi-calendar-range"></i> Booking Timetable</h4>
                <p class="text-muted small">Check these slots to avoid double booking.</p>
                <table class="table table-hover mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Time Slot</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($facility->bookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                            <td><span class="badge bg-light-danger text-danger">Occupied</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No bookings yet. Be the first to book!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Side: Booking Action -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>Ready to Play?</h5>
                <p class="text-muted small">Secure your slot now.</p>
                <a href="{{ route('bookings.create', $facility->id) }}" class="btn btn-primary btn-lg w-100">
                    Proceed to Booking →
                </a>
                <a href="{{ route('facilities') }}" class="btn btn-light mt-3 w-100">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection