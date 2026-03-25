<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'license_number',
        'preferred_hub_id',
        'can_sparring',
        'phone',
        'gender',
        'callsign',
        'address',
        'post_code',
        'city',
        'country_id',
        'date_of_birth',
        'place_of_birth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    // RELATIONS

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function attributions()
    {
        return $this->belongsToMany(Attribution::class);
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    public function preferredHub()
    {
        return $this->belongsTo(Branch::class, 'preferred_hub_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function bookingsAsInstructor()
    {
        return $this->hasMany(Booking::class, 'instructor_id');
    }

    public function bookingParticipations()
    {
        return $this->hasMany(BookingParticipant::class, 'student_id');
    }
}
