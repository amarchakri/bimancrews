<?php

namespace App\Livewire;


use App\Models\Employee;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResponsibilityComponent extends Component
{
    
    public $editResponsibilityId;
    // #[Rule('required')]
    public $responsibility_designation, $editingSresponsibility_designation;

    public function resetForm()
    {
        $this->editResponsibilityId = '';
        $this->responsibility_designation = '';
        $this->editingSresponsibility_designation = '';
    } 
    public function updated($field)
    {
        $this->validateOnly($field,[
            'responsibility_designation'=>'required',
            'editingSresponsibility_designation'=>'required',
        ]);
    }
    public function storeResponsibility()
    {
        // dd($this->long_designation);
        $this->validate([            
            'responsibility_designation'=>'required',
        ]);
        $responsibilitynStore = new Responsibility();
        $responsibilitynStore->responsibility_designation = $this->responsibility_designation;
        $responsibilitynStore->save();
        session()->flash('success','Responsibility designation added successfuly.');
        $this->resetForm();
    }
    public function edit($id)
    {
        $designation = Responsibility::find($id);
        $this->editResponsibilityId = $id;
        $this->editingSresponsibility_designation = $designation->responsibility_designation ;
        

    }
    public function update()
    {
        $this->validate([            
            'editingSresponsibility_designation'=>'required',
        ]);
        Responsibility::where('id', $this->editResponsibilityId)->update([
            'responsibility_designation'=>$this->editingSresponsibility_designation,
        ]);
        session()->flash('success','Responsibility updated successfuly.');
        $this->resetForm();

    }
    public function delete($id)
    {        
        Responsibility::find($id)->delete();
        session()->flash('success','Responsibility deleted successfuly.');
        $this->resetForm();
    }
    public function render()
    {
        $data['responsibilities'] = Responsibility::get();
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.responsibility-component',['data'=>$data]);
    }
}
