<?php

namespace App\Livewire;

use App\Models\CourseType as ModelsCourseType;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseType extends Component
{
    public $courseType, $description;
    public function resetForm()
    {
        $this->courseType = '';
        $this->description = '';
    }
    public function storeCourseType()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        ModelsCourseType::create([
            'employee_id'=>$employee->id,
            'courseType'=>$this->courseType,
            'description'=>$this->description,
        ]);
        session()->flash('message','Course type added successfully.');
        $this->resetForm();

    }
    public function render()
    {
        return view('livewire.course-type');
    }
}
