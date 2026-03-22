<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulator extends Model
{
    protected $fillable = ['branch_id', 'name', 'cost_per_hour'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
