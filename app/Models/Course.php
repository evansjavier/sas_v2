<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'variant'];

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
