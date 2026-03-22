<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name', 'address'];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function simulators()
    {
        return $this->hasMany(Simulator::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'preferred_hub_id');
    }
}
