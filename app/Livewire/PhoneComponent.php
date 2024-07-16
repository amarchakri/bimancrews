<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PhoneComponent extends Component
{
    #[Rule('required')]
    public $type, $number, $availability,$editIt,$editingType,$editingNumber,$editingAvailability;
    public $userId, $employee;
    public function mount()
    {
        if(isset(Auth::user()->id)){
        $this->userId = Auth::user()->id;
        $this->employee = Employee::where('user_id',$this->userId)->first();
        }
    }

    public function resetForm()
    {
        $this->type = '';
        $this->number = '';
        $this->availability = '';
        $this->editIt = '';
        $this->editingType = '';
        $this->editingNumber = '';
        $this->editingAvailability = '';
    }
    public function storePhone()
    {
        $phones = new Phone();
        $phones->employee_id = $this->employee->id;
        $phones->type = $this->type;
        $phones->number = $this->number;
        $phones->availability = $this->availability;
        $phones->save();
        session()->flash('message', 'You have successfully add phone number');
        $this->resetForm();
 
    }
    public function edit($id)
    {
        $phone = Phone::findOrFail($id);
        $this->editIt = $id;
        $this->editingType = $phone->type;
        $this->editingNumber = $phone->number;
        $this->editingAvailability = $phone->availability;
    }
    public  function update($id)
    {
        
        Phone::findOrFail($id)->update([
            'type'=>$this->editingType,
            'number'=>$this->editingNumber,
            'availability'=>$this->editingAvailability,
        ]);
        session()->flash('message', 'Phone number updated successfully.');
        $this->resetForm();
    }
    public function render()
    { 
        $data['phones'] = Phone::where('employee_id', Auth::user()->id)->get();
        return view('livewire.phone-component',['data'=>$data]);
    }
}
 