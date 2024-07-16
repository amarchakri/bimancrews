<?php

namespace App\Livewire;

use App\Models\Course as ModelsCourse;
use App\Models\CourseType;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Course extends Component
{
    public $course_type_id, $course_name_short, $course_name_long, $description, $duration_number, $duration_in ;
    public function resetForm()
    {
        $this->course_type_id = '';
        $this->course_name_short = '';
        $this->course_name_long = '';
        $this->description = '';
        $this->duration_number = '';
        $this->duration_in = '';
    }
    public function storeCourseType()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // dd($employee->id);
        ModelsCourse::create([
            'employee_id'=>$employee->id,
            'course_type_id'=>$this->course_type_id,
            'course_name_short'=>$this->course_name_short,
            'course_name_long'=>$this->course_name_long,
            'description'=>$this->description,
            'duration_number'=>$this->duration_number,
            'duration_in'=>$this->duration_in,
        ]);
        session()->flash('message','Course added successfully.');
        $this->resetForm();
    }
    public function render()
    {
        // $data['courses'] = Proficiency::with(['employee','proficiencyType','course','institute'])
        //                             // ->where('proficiency_type_id',3)
        //                             ->get();
        
        $data['courseTypes'] = CourseType::get();
        return view('livewire.course',['data'=>$data]);
        // return view('livewire.course');
    }
}
