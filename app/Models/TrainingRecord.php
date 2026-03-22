<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingRecord extends Model
{
    protected $fillable = [
        'booking_id', 'enrollment_id', 'instructor_comment', 
        'grade', 'status', 'submitted_by_instructor_at', 
        'approved_by_student', 'approved_by_student_at'
    ];

    protected function casts(): array
    {
        return [
            'submitted_by_instructor_at' => 'datetime',
            'approved_by_student_at' => 'datetime',
            'approved_by_student' => 'boolean',
        ];
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
