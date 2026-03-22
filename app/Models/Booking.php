<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'type', 'status', 'lesson_id', 'instructor_id', 
        'classroom_id', 'simulator_id', 'start_time', 'end_time', 'comment'
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function simulator()
    {
        return $this->belongsTo(Simulator::class);
    }

    public function participants()
    {
        return $this->hasMany(BookingParticipant::class);
    }

    public function trainingRecords()
    {
        return $this->hasMany(TrainingRecord::class);
    }
}
