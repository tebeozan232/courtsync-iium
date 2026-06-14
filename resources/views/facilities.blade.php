@extends('layouts.master')

@section('content')
<div class="row">
    @foreach($facilities as $f)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $f->name }}</h4>
                <p>{{ $f->location }}</p>
                <!-- Change your button to this -->
<a href="{{ route('bookings.create', $f->id) }}" class="btn btn-primary w-50">Book →</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection