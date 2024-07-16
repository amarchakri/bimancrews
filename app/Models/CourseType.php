<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function proficiencies()
    {
        return $this->hasManyThrough(Proficiency::class, Course::class);
    }
}
