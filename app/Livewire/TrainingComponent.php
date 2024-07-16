<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Employee;
use App\Models\Proficiency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TrainingComponent extends Component
{
    public $editIt, $employee;
    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->employee = Employee::where('employee_no', $user->employee_no)->first();
    }
    public function render()
    {
        $data['proficiencies'] = Proficiency::with(['employee','course'])->where('employee_id',$this->employee->id)->get();
        // $data['trainings'] = Proficiency::where('employee_id',$this->employee->id)->get();
        return view('livewire.training-component',['data'=>$data]);
    }
}
