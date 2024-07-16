<?php

namespace App\Livewire;

use App\Models\ProfiencyType;
use Livewire\Component;

class ProfileTypeComponent extends Component
{
    public $editIt, $profiencyType, $description, $editingDescription, $editingProficiencyType;
    public function render()
    {
        $data['proficiencyTypes'] = ProfiencyType::with('employee')->get();
        return view('livewire.profile-type-component',['data'=>$data]);
    }
}
