<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['program_id', 'name', 'briefing_text'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
