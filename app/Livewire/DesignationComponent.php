<?php

namespace App\Livewire;

use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class DesignationComponent extends Component
{
    public $editDesignationId;
    // #[Rule('required')]
    public $short_designation, $long_designation, $pseudo_designation, $duty_bound, $payGroup, $department, $editingShort_designation, $editingLong_designation;
    public $editingpSeudo_designation, $editingDuty_bound, $editingPayGroup, $editingDepartment;

    public function resetForm()
    {
        $this->editDesignationId = '';
        $this->short_designation = '';
        $this->long_designation = '';
        $this->pseudo_designation = '';
        $this->duty_bound = '';
        $this->payGroup = '';
        $this->department = '';
        $this->editingShort_designation = '';
        $this->editingLong_designation = '';
        $this->editingpSeudo_designation = '';
        $this->editingDuty_bound = '';
        $this->editingPayGroup = '';
        $this->editingDepartment = '';
    } 
    public function updated($field)
    {
        $this->validateOnly($field,[
            'short_designation'=>'required',
            'long_designation'=>'required',
            'editingShort_designation'=>'required',
            'editingLong_designation'=>'required',
        ]);
    }
    public function storeDesignation()
    {
        // dd($this->long_designation);
        $this->validate([            
            'short_designation'=>'required',
            'long_designation'=>'required',
        ]);
        $designationStore = new Designation();
        $designationStore->short_designation = $this->short_designation;
        $designationStore->long_designation = $this->long_designation;
        $designationStore->pseudo_designation = $this->pseudo_designation;
        $designationStore->duty_bound = $this->duty_bound;
        $designationStore->payGroup = $this->payGroup;
        $designationStore->department = $this->department;
        $designationStore->save();
        session()->flash('success','Designation added successfuly.');
        $this->resetForm();
    }
    public function edit($id)
    {
        $designation = Designation::find($id);
        $this->editDesignationId = $id;
        $this->editingShort_designation = $designation->short_designation ;
        $this->editingLong_designation = $designation->long_designation ;
        $this->editingpSeudo_designation = $designation->pseudo_designation ;
        $this->editingDuty_bound = $designation->duty_bound ;
        $this->editingPayGroup = $designation->payGroup ;
        $this->editingDepartment = $designation->department ;

    }
    public function update()
    {
        $this->validate([            
            'editingShort_designation'=>'required',
            'editingLong_designation'=>'required',
        ]);
        Designation::where('id', $this->editDesignationId)->update([
            'short_designation'=>$this->editingShort_designation,
            'long_designation'=>$this->editingLong_designation,
            'pseudo_designation'=>$this->editingpSeudo_designation,
            'duty_bound'=>$this->editingDuty_bound,
            'payGroup'=>$this->editingPayGroup,
            'department'=>$this->editingDepartment,
        ]);
        session()->flash('success','Designation updated successfuly.');
        $this->resetForm();

    }
    public function delete($id)
    {        
        Designation::find($id)->delete();
        session()->flash('success','Designation deleted successfuly.');
        $this->resetForm();
    }
    public function render()
    {
        $data['designations'] = Designation::get();
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.designation-component',['data'=>$data]);
    }
}
