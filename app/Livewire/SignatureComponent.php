<?php

namespace App\Livewire;

use App\Models\Employee;
use Faker\Core\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignatureComponent extends Component
{
    public $signature;
    use WithFileUploads;
    

    public function resetForm()
    {
        $this->signature = '';

    }    
    public function storeSignature()
    {               
        $employee = Employee::where('user_id', Auth::user()->id)->first(); 
        $image_name=time().'-'.$this->signature->getClientOriginalName();
        $res=$this->signature->storeAs('signatureImage',$image_name, 'custom_public_path');
        $img_path=asset('uploads/signaturePhoto/'.$image_name);
                  //code for remove old file
        //   if($employee->signature != ''  && $employee->signature != null){
        //        $file_old = $img_path.$employee->signature;
        //        unlink($file_old);
        //   }
        Employee::where('user_id',Auth::user()->id)->update([
                'signature'=> $image_name,
            ]);
            session()->flash('message','Your signature updated successfully.');
            $this->resetForm();     
    }
    public function render()
    {        
        $data['signature'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.signature-component',['data'=>$data]);
    }
}
