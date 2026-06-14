<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // This allows these fields to be saved in the database
    protected $fillable = [
        'user_id', 
        'facility_id', 
        'booking_date', 
        'start_time', 
        'end_time', 
        'status'
    ];

    /**
     * Relationship: A booking belongs to a Facility.
     * This allows us to do: $booking->facility->name
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
    
    /**
     * Relationship: A booking belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}