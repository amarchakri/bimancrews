<?php

namespace App\Livewire;

use App\Models\Email;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmailComponent extends Component
{
    public $type, $email, $priority,$editIt,$editingType,$editingEmail,$editingPriority;
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
        $this->email = '';
        $this->priority = '';
        $this->editIt = '';
        $this->editingType = '';
        $this->editingEmail = '';
        $this->editingPriority = '';
    }
    public function storeEmail()
    {
        $emails = new Email();
        $emails->employee_id = $this->employee->id;
        $emails->type = $this->type;
        $emails->email = $this->email;
        $emails->priority = $this->priority;
        $emails->save();
        session()->flash('message', 'You have successfully add email address');
        $this->resetForm();

    } 
    public function edit($id)
    {
        $email = Email::findOrFail($id);
        $this->editIt = $id;
        $this->editingType = $email->type;
        $this->editingEmail = $email->email;
        $this->editingPriority = $email->priority;
    }
    public  function update($id)
    {
        
        email::findOrFail($id)->update([
            'type'=>$this->editingType,
            'email'=>$this->editingEmail,
            'priority'=>$this->editingPriority,
        ]);
        session()->flash('message', 'email address updated successfully.');
        $this->resetForm();
    }
    public function delete($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
        session()->flash('message', 'email address deleted successfully.');
        $this->resetForm();
    }
    public function render()
    {
        $data['emails'] = Email::with('employee')->get();
        return view('livewire.email-component',['data'=>$data]);
    }
}
 