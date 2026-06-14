<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility; // <--- ADD THIS
use App\Models\Booking;  // <--- ADD THIS

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('facilities', compact('facilities'));
    }

    public function show($id)
    {
        // This is line 18 where your error is
        $facility = Facility::with('bookings')->findOrFail($id); 

        return view('facilities.show', compact('facility'));
    }
}