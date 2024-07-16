<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageComponent extends Component
{
    public $profileImage;
    use WithFileUploads;
    

    public function resetForm()
    {
        $this->profileImage = '';

    }    
    public function storeprofileImage()
    {               
        $employee = Employee::where('user_id', Auth::user()->id)->first(); 
        $image_name=time().'-'.$this->profileImage->getClientOriginalName();
        $res=$this->profileImage->storeAs('profileImage',$image_name, 'custom_public_path');
        $img_path=asset('uploads/profilePhoto/'.$image_name);
                  //code for remove old file
        //   if($employee->profileImage != ''  && $employee->profileImage != null){
        //        $file_old = $img_path.$employee->profileImage;
        //        unlink($file_old);
        //   }
        Employee::where('user_id',Auth::user()->id)->update([
                'profile_image'=> $image_name,
            ]);
            session()->flash('message','Your profile image updated successfully.');
            $this->resetForm();     
    }
    public function render()
    {      
        $data['profileImage'] = Employee::where('user_id', Auth::user()->id)->first();
        return view('livewire.image-component', ['data'=>$data]);
    }
}
