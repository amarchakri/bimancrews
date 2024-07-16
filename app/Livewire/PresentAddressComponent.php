<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PresentAddressComponent extends Component
{ 
    public $present_address, $editPresentAddressId, $editingPresentAddress;
    
    public function resetForm()
    {
        $this->present_address = '';
        $this->editPresentAddressId = '';
    }
    
    public function storePresentAddress()
    {        
        Employee::where('user_id', Auth::user()->id)->update([
            'present_address'=> $this->present_address,
        ]);
        session()->flash('success','Your present address updated successfully.');
        $this->resetForm();
        // $this->address();
    }
    public function editPresentAddress($id)
    {   
        $employee = Employee::find($id);   
        $this->editPresentAddressId  = $id;
        $this->editingPresentAddress = $employee->present_address;
    }
    public function updatePresentAddress()
    {

        Employee::find($this->editPresentAddressId)->update([
            'present_address'=> $this->editingPresentAddress,
        ]);
        session()->flash('success','Your present address updated successfully.');
            $this->resetForm();
        // $this->address();
    }
    public function render()
    {
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.present-address-component',['data'=>$data]);
    }
}
