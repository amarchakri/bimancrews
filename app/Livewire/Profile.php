<?php

namespace App\Livewire;

use App\Models\Designation;
use App\Models\Email;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Biman crew - Profile')]
class Profile extends Component
{
    use WithFileUploads;
    
    #[Rule('required')]
 
    public $photo, $profile_image, $signature, $designgation, $pseudo_designation, $designation_duty_bounds;
    public $editDesignationId, $editingDesignation;
    public $baseDesignations, $additionDesignations, $actingDesignations, $dutyDesignations, $number, $availability;
    public $editbaseDesignationsId;

    public $userId, $employee, $editAddresesId, $emailEditId;
    public $names = false;
    public $contact = false;    
    public $signImage = false;    
    // public $contactes = false;     
    public $qualifications = false;  
    public $images = false;  
    
    public function create()
    {
        $this->resetForm();
        $this->OpenEmail();
    }
    
    public function resetForm()
    {
        // $this->user_id = '';
        // $this->first_name = '';
        // $this->last_name = '';
        // $this->middle_name = '';
        // $this->roster_name = '';
        // $this->editNamesId = '';
        // $this->present_address = '';
        // $this->permanent_address = '';
        // $this->editPresentAddressId = '';
        // $this->editPermanentAddressId = '';
        // $this->type = '';
        $this->number = '';
        $this->availability = '';
        $this->names = '';
        $this->contact = '';
        $this->qualifications = '';
        $this->signImage = '';
        $this->editAddresesId = '';
        $this->baseDesignations = '';
        $this->additionDesignations = '';
        $this->actingDesignations = '';
        $this->dutyDesignations = '';
        $this->editbaseDesignationsId = '';
    }
    public function storebaseDesignations()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employee->designations()->create([
            'designation_id'=>$this->designation_id,
            'employee_id'=>$employee->id,
            'designation_id'=>$this->designation_id,
            'designation_id'=>$this->designation_id,
        ]);
    }
    public function name()
    {
        $this->resetForm();
        $this->names = true;
    }  
    public function contacts()
    {
        $this->resetForm();
        $this->contact = true;
    }
    public function signPhoto()
    {
        $this->resetForm();
        $this->signImage = true;
    }
    public function education()
    {
        $this->resetForm();
        $this->qualifications = true;
    }
    // public function contact()
    // {
    //     $this->resetForm();
    //     $this->contactes = true;
    // }
    public function image()
    {
        $this->resetForm();
        $this->images = true;
    }
    public function mount()
    {
        if(isset(Auth::user()->id)){
        $this->userId = Auth::user()->id;
        $this->employee = Employee::where('user_id',$this->userId)->first();
        }
    }
    public function render()
    {
        $data['allDesignations'] = Designation::get();
        // $data['baseDesignations'] = Designation::where('type',1)->first();
        // $data['additionDesignations'] = Designation::where('type',2)->first();
        // $data['actingDesignations'] = Designation::where('type',3)->first();
        // $data['dutyDesignations'] = Designation::where('type',4)->first();
        // $data['designation_pseudos'] = DesignationPseudo::get();
        // $data['designation_duty_bounds'] = DesignationDutyBound::get();
        // $data['user'] = User::with('employee')->find(Auth::user()->id);
        // $data['profile'] = Employee::with(['user','designation'])->where('user_id',Auth::user()->id)->first();
        $data['profile'] = $this->employee;
        // $data['emails'] = Email::with('employee')->get();
        // session()->flash('message', 'You have successfully logged in!');
        return view('livewire.profile',['data'=>$data]);
    }
}
