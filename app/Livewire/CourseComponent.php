<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseComponent extends Component
{
    public $description, $course_name_short, $course_name_long, $duration_number, $duration_in, $editIt, $editingCourse_name_short, $editingCourse_name_long, $editingDescription;    
    protected $rules = [     
        'course_name_short'=>'required',
        'course_name_long'=>'required',
        'description'=>'required',
        'duration_number'=>'required',
    ];
    protected $messages = [ 
        'course_name_short.required'=>'Crew short course must.',
        'course_name_long.required'=>'Crew long course must.',
        'description.required'=>'Crew course description must.',
        'duration_number.required'=>'Crew course duration must.',
    ];
    protected $validationAttributes = [     
        'course_name_short'=>'Course short name',
        'course_name_long'=>'Course long name',
        'description'=>'Description',
        'duration_number'=>'Course duration',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function storeCourse()
    {
        $validatedData = $this->validate(); 
        // Course::create([$validatedData]);
        $course = new Course();
        $course->employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;
        $course->course_name_short = $this->course_name_short;
        $course->course_name_long = $this->course_name_long;
        $course->description = $this->description;
        $course->duration_number = $this->duration_number;
        $course->duration_in = $this->duration_in;
        $course->save();
        session()->flash('message', 'Course name added successfully.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->course_name_short = '';
        $this->course_name_long = '';
        $this->description = '';
        $this->duration_number = '';
        $this->duration_in = '';
        $this->editingCourse_name_short = '';
        $this->editingCourse_name_long = '';
        $this->editingDescription = '';
    }
    public function render()
    {
        $data['courses'] = Course::with('employee')->get();
        return view('livewire.course-component', ['data'=>$data]);
    }
}
