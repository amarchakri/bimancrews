<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function designations()
    {
        return $this->belongsToMany(Designation::class)
                    ->withPivot([
                        'duty_from',
                        'duty_to',
                        'type',
                        'reason',
                    ])
                    ->withTimestamps();
    }
    public function families()
    {
        return $this->hasMany(Family::class);
    }
    public function passages()
    {
        return $this->hasMany(Passage::class);
    }
    public function emails()
    {
        return $this->hasMany(Email::class);
    }
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
    public function offdays()
    {
        return $this->hasMany(offdays::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function courseTypes()
    {
        return $this->hasMany(CourseType::class);
    }
    public function courseAuthorities()
    {
        return $this->hasMany(Proficiency::class);
    }
    public function proficiencies()
    {
        return $this->hasMany(Proficiency::class);
    }
}
