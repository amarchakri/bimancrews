<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class InstituteComponent extends Component
{
    // #[Rule('required')]
    public $institute_name, $editingInstituteName;
    public $editIt;
    public $address;
    public $editingAddress;

    public function storeInstitute()
    {
        // dd('Institute');
        // $this->validate();
        // $employee = Employee::where('user_id', Auth::user()->id)->first();
        // $institute = new Institute();
        // $institute->employee_id = $employee->id;
        // $institute->institute_name = $this->institute_name;
        // $institute->address = $this->address;
        // $institute->save();


    }
    public function render()
    {
        // $data['institutes'] = Institute::with('employee')->get(); 
        // return view('livewire.institute-component',['data'=>$data]);
    }
}
