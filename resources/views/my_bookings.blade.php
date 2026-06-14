@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>My Bookings</h3>
    <p class="text-subtitle text-muted">View and manage your court reservations.</p>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Facility</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->facility->name }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                        <td>
                            <span class="badge bg-light-warning text-warning">{{ $booking->status }}</span>
                        </td>
                        <td>
                            <!-- DELETE CRUD: The Cancel Button -->
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Cancel
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No bookings found. <a href="/facilities">Book one now!</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection