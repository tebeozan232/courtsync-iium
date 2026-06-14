<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Facility;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // 1. READ: Show all bookings for the logged-in student
    public function index()
    {
        // Get only the bookings belonging to the current user
        $bookings = Booking::where('user_id', auth()->id())->with('facility')->get();
        return view('my_bookings', compact('bookings'));
    }

    // 2. CREATE: Show the booking form
    public function create($id)
    {
        $facility = Facility::findOrFail($id);
        return view('booking_form', compact('facility'));
    }

    // 3. STORE: Save the booking to database (CRUD - Create)
    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'facility_id' => $request->facility_id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('my.bookings')->with('success', 'Booking submitted successfully!');
    }

    // 4. DELETE: Cancel a booking (CRUD - Delete)
    public function destroy($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $booking->delete();

        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }

    // Add this method inside your BookingController class
    public function dashboard()
    {
        // These variables provide the real data for your dashboard cards
        $totalBookings = Booking::where('user_id', auth()->id())->count();
        $upcomingBookings = Booking::where('user_id', auth()->id())->where('booking_date', '>=', now())->count();
        $completedBookings = Booking::where('user_id', auth()->id())->where('booking_date', '<', now())->count();
        $activeCourts = \App\Models\Facility::count();
    
        // This provides the data for the "Recent Activity" table
        $recentBookings = Booking::where('user_id', auth()->id())->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBookings', 
            'upcomingBookings', 
            'completedBookings', 
            'activeCourts', 
            'recentBookings'
        ));
    }
}