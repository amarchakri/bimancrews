<?php

namespace App\Livewire;

use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BaseDesignation extends Component
{
    public $designation_id, $duty_from, $duty_to, $type, $reason;
    public $editIt, $editingDesignation_id, $editingDuty_from, $editingDuty_to, $editingReason, $editingType;
    public function resetForm()
    {        
        $this->designation_id  = '';
        $this->duty_from = '';
        $this->duty_to = '';
        $this->type = '';
        $this->reason = '';
        $this->editingDesignation_id = '';
        $this->editingDuty_from = '';
        $this->editingDuty_to = '';
        $this->editingReason = '';
        $this->editingType = '';
    }
    public function storebaseDesignations()
    {
        $employee = Employee::where('user_id',Auth::user()->id)->first();
        $employee->designations()->attach([
            1=>[
                'designation_id'=>$this->designation_id,
                'duty_from'=>$this->duty_from,
                'duty_to'=>$this->duty_to,
                'type'=>$this->type,
                'reason'=>$this->reason,
            ]
        ]);
        session()->flash('success', 'Designation added successfully.');
        $this->resetForm();
    }
    public function render()
    {
        $data['profile'] = Employee::where('user_id',Auth::user()->id)->first();
        $data['allDesignations'] = Designation::get();
        return view('livewire.base-designation',['data'=>$data]);
    }
}
