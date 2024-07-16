<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseAuthority;
use App\Models\CourseType;
use App\Models\Employee;
use App\Models\Proficiency;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[title('Biman crew - Course entry')]
class CourseManagement extends Component
{
    use WithFileUploads;
    
    public $course_id, $course_type_id, $employee_id, $course_authority_id, $institute, $executor, $aircraft, $reference, $start_date, $end_date, $validupto, $certificate_image, $transcript_image;
    public $editIt, $editingEmployee_id, $editingCourse_authority_id, $editingCourseId, $editingInstitute, $editingExecutor, $editingAircraft, $editingReference, $editingStartDate, $editingEndDate, $editingValidupto, $editingCertificate_image, $editingTranscript_image;
    
    
    public function resetForm()
    {
        $this->employee_id = '';
        $this->course_id = '';
        $this->course_type_id = '';
        $this->course_authority_id = '';
        $this->institute = '';
        $this->executor = '';
        $this->aircraft = '';
        $this->reference = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->validupto = '';
        $this->certificate_image = '';
        $this->transcript_image = '';

        $this->editIt = '';
        $this->editingEmployee_id = '';
        $this->editingCourseId = '';
        $this->editingCourse_authority_id = '';
        $this->editingInstitute = '';
        $this->editingExecutor = '';
        $this->editingAircraft = '';
        $this->editingReference = '';
        $this->editingStartDate = '';
        $this->editingEndDate = '';
        $this->editingValidupto = '';
        $this->editingCertificate_image = '';
        $this->editingTranscript_image = '';    
    }    
    protected $rules = [     
        'course_id'=>'required',
        'institute'=>'required',
        'start_date'=>'required',
    ];
    protected $messages = [ 
        'course_id.required'=>'Crew short course must.',
        'institute.required'=>'Crew long course must.',
        'start_date.required'=>'Crew course start date must.',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }   
    public function storeProficiency()
    {
        $this->validate();
        //Certificate
        if($this->certificate_image){
            $image_certificate=time().'-'.$this->certificate_image->getClientOriginalName();
            $res=$this->certificate_image->storeAs('certificateImage',$image_certificate, 'custom_public_path');
            $img_path=asset('uploads/certificatePhoto/'.$image_certificate);
        }else{
            $image_certificate = Null;
        }
        //Transcript
        if($this->transcript_image){
            $image_transcript=time().'-'.$this->transcript_image->getClientOriginalName();
            $res=$this->transcript_image->storeAs('transcriptImage',$image_transcript, 'custom_public_path');
            $img_path=asset('uploads/transcriptPhoto/'.$image_transcript);
        }else{
            $image_transcript = NULL;
        }
// dd($this->institute_id);

        $proficiency = new Proficiency();
        $proficiency->employee_id = $this->employee_id; //other employee ID
        $proficiency->course_type_id = $this->course_type_id; //Training Basic
        $proficiency->auth_employee_id =  Employee::where('user_id', Auth::user()->id)->first()->id;// admin to modify other emplyee information
        $proficiency->course_id = $this->course_id;
        $proficiency->course_authority_id = $this->course_authority_id;
        $proficiency->institute = $this->institute;
        $proficiency->executor = $this->executor;
        $proficiency->aircraft = $this->aircraft;
        $proficiency->reference = $this->reference;
        $proficiency->start_date = $this->start_date;
        $proficiency->end_date = $this->end_date;
        $proficiency->validupto = $this->validupto;
        $proficiency->certificate_image = $image_certificate;
        $proficiency->transcript_image = $image_transcript;
        $proficiency->save();
        session()->flash('success','Proficiency added successfully.');
        $this->resetForm();
    }
    public function edit($id)
    {
        $proficiency = Proficiency::find($id);
        $this->editIt = $id;
        $this->editingCourseId = $proficiency->course_id;
        $this->editingCourse_authority_id = $proficiency->course_authority_id;
        $this->editingInstitute = $proficiency->institute;
        $this->editingExecutor = $proficiency->executor;
        $this->editingAircraft = $proficiency->aircraft;
        $this->editingReference = $proficiency->reference;
        $this->editingStartDate = $proficiency->start_date;
        $this->editingEndDate = $proficiency->end_date;
        $this->editingValidupto = $proficiency->validupto;
        $this->editingCertificate_image = $proficiency->certificate_image;
        $this->editingTranscript_image = $proficiency->transcript_image;
    }
    public function update($id)
    {
        Proficiency::find($this->editIt)->update([            
        'course_id' => $this->editingCourseId,
        'course_type_id' => $this->editingCourse_type_id,
        'course_authority_id' => $this->editingCourse_authority_id,
        'institute' => $this->editingInstitute,
        'executor' => $this->editingExecutor,
        'aircraft' => $this->editingAircraft,
        'reference' => $this->editingReference,
        'start_date' => $this->editingStartDate,
        'end_date' => $this->editingEndDate,
        'validupto' => $this->editingValidupto,
        'certificate_image' => $this->editingCertificate_image,
        'transcript_image' => $this->editingTranscript_image,
        ]);
        session()->flash('success','Proficiency updated successfully.');
        $this->resetForm();
    }
    public function delete($id)
    {
        $proficiency = Proficiency::find($id);
        $proficiency->delete();
        session()->flash('success','Proficiency deleted successfully.');
        $this->resetForm();
    }
    public function render()
    {
        $data['employee'] = Employee::get();
        $data['courses'] = Course::get();
        $data['coursesAuths'] = CourseAuthority::get();
        // $house = House::with(["occupants" => function ($query) { 
        //     $query->where("active","=",1); 
        // },"occupants.job"])->find($house_id);
        // foreach ($house->occupants as $occupant) {
        //     print_r($occupant->job);
        // }
        

        $data['coursesTypes'] = CourseType::get();
        $data['trainings-seep'] = Proficiency::with(['employee','course','courseAthority'])->where('course_type_id',3)->where('course_id',9)->get();
        $data['trainings'] = Proficiency::with(['employee','course','courseAthority'])->where('course_type_id',3)->get();
        $data['proficiencies'] = Proficiency::with(['employee','course','courseAthority'])->get();
        return view('livewire.course-management',['data'=>$data]);
    }
}
