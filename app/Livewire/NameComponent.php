<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NameComponent extends Component
{
    #[Rule('required')]
    public $first_name, $last_name; 
    public $signatures, $roster_nameCheckbox, $middle_nameCheckbox, $user_id, $middle_name, $roster_name;
    public $editNamesId, $editingfirst_name,$editingmiddle_name, $editingmiddle_nameCheckbox, $editinglast_name, $editingroster_nameCheckbox, $editingroster_name;
    
    public function resetForm()
    {
        $this->user_id = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->middle_name = '';
        $this->roster_name = '';
        $this->editNamesId = '';
        // $this->present_address = '';
        // $this->permanent_address = '';
        // $this->editPresentAddressId = '';
        // $this->editPermanentAddressId = '';
        // $this->type = '';
        // $this->number = '';
        // $this->availability = '';
        // $this->names = '';
        // $this->contact = '';
        // $this->qualifications = '';
        // $this->signImage = '';
        // $this->editAddresesId = '';

    }
    public function storeNames()
    {
        // dd($this->first_name,  $this->last_name,  $this->roster_name);
        $profile = Employee::where('user_id', Auth::user()->id)->first();
            $this->validate();
            // $names = new Employee();
            // $this->user_id = Auth::user()->id ;
            // $profile->employee_no = Auth::user()->employee_no ;
            // $profile->first_name = $this->first_name ;
            // $profile->last_name = $this->last_name ;
                if($this->middle_nameCheckbox){
                $this->middle_name = 'N/A' ;            
                }else{
                $this->middle_name = $this->middle_name ;
                }
                if($this->roster_nameCheckbox){
                $this->roster_name = 'N/A' ;            
                }else{
                $this->roster_name = $this->roster_name ;
                }
                Employee::find($profile->id)->update([
                'first_name'=> $this->first_name,
                'middle_name'=> $this->middle_name,
                'last_name'=> $this->last_name,
                'roster_name'=> $this->roster_name,
            ]);        
            $this->resetForm();
            session()->flash('success','Your name inserted successfully.');
    }
    public function editNames($id)
    {   
        $employee = Employee::find($id);  
        $this->editNamesId = $id;
        $this->editingfirst_name = $employee->first_name;
        $this->editinglast_name = $employee->last_name;
        $this->editingmiddle_name = $employee->middle_name;
        $this->editingroster_name = $employee->roster_name;
    }
    public function updateNames()
    {       
        if($this->editingmiddle_nameCheckbox){
        $this->editingmiddle_name = 'N/A' ;            
        }else{
        $this->editingmiddle_name = $this->editingmiddle_name;
        }
        if($this->editingroster_nameCheckbox){
        $this->editingroster_name = 'N/A' ;            
        }else{
        $this->editingroster_name = $this->editingroster_name;
        }
        Employee::find($this->editNamesId)->update([
            'first_name'=> $this->editingfirst_name,
            'middle_name'=> $this->editingmiddle_name,
            'last_name'=> $this->editinglast_name,
            'roster_name'=> $this->editingroster_name,
        ]);
        session()->flash('success','Your name updated successfully.');
        $this->resetForm();
        // $this->name();
    }
    public function render()
    {
        $data['profile'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.name-component',['data'=>$data]);
    }
}
