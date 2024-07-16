<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // public function coursetype()
    // {
    //     return $this->belongsToThrough(
    //         CourseType::class, 
    //         Course::class,
    //         'id',
    //         'id',
    //         'course_type_id',
    //         'course_id',
    //     );
    // }
    public function courseAthority()
    {
        return $this->belongsTo(CourseAuthority::class,'course_authority_id','id');
    }
}
