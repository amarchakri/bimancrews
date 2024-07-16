<?php

namespace App\Livewire;

use App\Models\CourseAuthority as ModelsCourseAuthority;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseAuthority extends Component
{
    public $name, $address, $description;
    public function resetForm()
    {
        $this->name = '';
        $this->address = '';
        $this->description = '';
    }
    public function storeAuthority()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        ModelsCourseAuthority::create([
            'employee_id'=>$employee->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'description'=>$this->description,
        ]);
        session()->flash('message','Board / Authority added successfully.');
        $this->resetForm();
    }
    public function render()
    {
        return view('livewire.course-authority');
    }
}
