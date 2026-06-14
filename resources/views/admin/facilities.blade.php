@extends('layouts.master')

@section('content')
<div class="page-heading d-flex justify-content-between align-items-center">
    <div>
        <h3><i class="bi bi-tools text-success"></i> Facility Management</h3>
        <p class="text-subtitle text-muted">Add, update, or remove IIUM sports facilities.</p>
    </div>
    <div>
        <a href="/dashboard" class="btn btn-light-secondary me-2">Back</a>
        <!-- Button to open the Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-circle"></i> Add Facility
        </button>
    </div>
</div>

<section class="section">
    <div class="card shadow-sm">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-light-success color-success mb-4">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facilities as $f)
                    <tr>
                        <td class="fw-bold">{{ $f->name }}</td>
                        <td>{{ $f->location }}</td>
                        <td><span class="badge bg-light-primary text-primary">{{ $f->category }}</span></td>
                        <td class="text-center">
                            <!-- DELETE ACTION (CRUD: Delete) -->
                            <form action="{{ route('admin.facilities.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Delete this facility?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- MODAL: ADD FACILITY (CRUD: Create) -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Sports Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.facilities.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Facility Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Futsal Court C" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. Complex B" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select name="category" class="form-select" required>
                            <option value="Futsal">Futsal</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Stadium">Stadium</option>
                            <option value="Swimming">Swimming</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Facility</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection