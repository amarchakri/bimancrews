<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $userId, $employee;
    public function mount()
    {
        if(isset(Auth::user()->id)){
        $this->userId = Auth::user()->id;
        $this->employee = Employee::where('user_id',$this->userId)->first();
        }
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
