<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingParticipant extends Model
{
    protected $fillable = ['booking_id', 'student_id', 'session_role'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
