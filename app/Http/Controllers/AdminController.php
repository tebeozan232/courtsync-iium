<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class AdminController extends Controller
{
    // 1. Show all facilities to the Admin
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities', compact('facilities'));
    }

    // 2. Add a new facility (Admin Only)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'category' => 'required',
        ]);

        Facility::create($request->all());

        return redirect()->back()->with('success', 'New facility added successfully!');
    }

    // 3. Delete a facility (Admin Only)
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();

        return redirect()->back()->with('success', 'Facility removed.');
    }
}