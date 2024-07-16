<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\ProfiencyType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProficiencyTypeComponent extends Component
{
    public $editIt, $profiencyType, $description, $editingDescription, $editingProficiencyType;

    public function resetForm()
    {

    }
    public function storeProficiencyType()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $profiencyType = new ProfiencyType();
        $profiencyType->employee_id = $employee->id;
        $profiencyType->profiencyType = $this->profiencyType;
        $profiencyType->description = $this->description;
        $profiencyType->save();

    }
    public function render()
    {
        $data['proficiencyTypes'] = ProfiencyType::with('employee')->get();
        return view('livewire.proficiency-type-component',['data'=>$data]);
    }
}
