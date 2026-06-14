@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
                <h4 class="card-title text-white">Book: {{ $facility->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="facility_id" value="{{ $facility->id }}">
                    
                    <div class="form-group mb-3">
                        <label>Date</label>
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Start Time</label>
                        <input type="time" name="start_time" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>End Time</label>
                        <input type="time" name="end_time" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('facilities') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-success">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection