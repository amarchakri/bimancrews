<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Proficiency;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Biman crew - Dashboard')] 
class Dashboard extends Component
{
    public $userId, $employee;
    public $editIt;
    public function mount()
    {
        if(isset(Auth::user()->id)){
        $this->userId = Auth::user()->id;
        $this->employee = Employee::where('user_id',$this->userId)->first();
        }
    }
    public function render()
    {
        $trainings = Proficiency::with(['employee','course','courseAthority'])
                                ->where('course_type_id',3)
                                ->where('course_id',9);
        $data['trainings-seep'] = $trainings
                                ->where('employee_id',$this->employee->id)
                                ->get();
        $data['trainings'] = Proficiency::with(['employee','course','courseAthority'])->where('course_type_id',3)->get();
        $data['proficiencies'] = Proficiency::with(['employee','course','courseAthority'])->get();
        return view('livewire.dashboard',['data'=>$data]);
    }
}