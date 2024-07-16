<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PermanentAddressComponent extends Component
{
    #[Rule('required')]
    public $permanent_address,$editingPermanentAddress;
    public $editPermanentAddressId;
    
    
    public function resetForm()
    {
        $this->permanent_address = '';
        $this->editPermanentAddressId = '';
    }
    
    public function storePermanentAddress()
    {        
        Employee::where('user_id', Auth::user()->id)->update([
            'permanent_address'=> $this->permanent_address,
        ]);
        session()->flash('success','Your present address updated successfully.');
        $this->resetForm();
        // return redirect()->back();
    }
    public function editPermanentAddress($id)
    {   
        $employee = Employee::find($id);  
        $this->editPermanentAddressId  = $id;
        $this->editingPermanentAddress = $employee->permanent_address;
    }
    public function updatePermanentAddress()
    {

        Employee::find($this->editPermanentAddressId)->update([
            'permanent_address'=> $this->editingPermanentAddress,
        ]);
        session()->flash('success','Your permanent address updated successfully.');
            $this->resetForm();
        // $this->contacts();
        
        return redirect()->back();
    }
    public function render()
    {
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.permanent-address-component',['data'=>$data]);
    }
}
