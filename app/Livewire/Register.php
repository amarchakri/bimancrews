<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Biman crew - Register')] 
class Register extends Component
{
    // #[Validate('required|string|min:3|max:250')]
    // public $name;

    #[Validate('required|max:10|unique:users,employee_no')]
    public $employee_no, $number_type;

    #[Validate('required|string|min:6|confirmed')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        // dd($this->employee_no, $this->password);
        $this->validate();
        
        $user = User::create([
            'employee_no' => $this->employee_no,
            'password' => Hash::make($this->password),
        ]);
        Employee::create([
            'user_id' => $user->id,
            'employee_no' => $this->employee_no,
            'number_type' => $this->number_type,
        ]);

        $credentials = [
            'employee_no' => $this->employee_no,
            'password' => $this->password,
        ];

        Auth::attempt($credentials);

        session()->flash('message', 'You have successfully registered & logged in!');
 
        return $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}