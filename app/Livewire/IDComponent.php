<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class IDComponent extends Component
{
    #[Rule('required')]
    public $employee_type, $number_type, $employee_no, $editingEmployee_type, $editingNumber_type, $editingEmployee_no;
    public $editId;
    public function resetForm()
    {
        $this->employee_type = '';
        $this->number_type = '';
        $this->employee_no = '';
        $this->editId = '';
        $this->editingEmployee_type = '';
        $this->editingNumber_type = '';
        $this->editingEmployee_no = '';

    }
    public function storeID()
    {
        
        // dd($this->employee_type,  $this->number_type,  $this->employee_no);
        $employee = Employee::where('user_id', Auth::user()->id)->first();

            $this->validate();
            
        Employee::find($employee->id)->update([
            'employee_type'=> $this->employee_type,
            'number_type'=> $this->number_type,
            'employee_no'=> $this->employee_no,
        ]);
        User::find(Auth::user()->id)->update([
            'employee_no'=> $this->employee_no
        ]);
            $this->resetForm();
            session()->flash('success','Your ID information updated successfully.');        

    }
    public function editIDs($id)
    {   
        $employee = Employee::find($id);  
        $this->editId = $id;
        $this->editingEmployee_type = $employee->employee_type;
        $this->editingNumber_type = $employee->number_type;
        $this->editingEmployee_no = $employee->employee_no;
    }
    public function updateID()
    { 
        Employee::find($this->editId)->update([
            'employee_type'=> $this->editingEmployee_type,
            'number_type'=> $this->editingNumber_type,
            'employee_no'=> $this->editingEmployee_no,
        ]);
        User::find(Auth::user()->id)->update([
            'employee_no'=> $this->editingEmployee_no
        ]);
        session()->flash('success','Your ID information updated successfully.');
        $this->resetForm();
        // $this->name();
    }
    public function render()
    {
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.i-d-component',['data'=>$data]);
    }
}
