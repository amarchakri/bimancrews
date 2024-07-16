<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseAuthority;
use App\Models\CourseType;
use App\Models\Employee;
use App\Models\Proficiency;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProficiencyAddComponent extends Component
{
    use WithFileUploads;
    
    public $course_id, $course_authority_id, $institute, $executor, $aircraft, $reference, $start_date, $end_date, $validupto, $certificate_image, $transcript_image;
    public $editIt, $editingCourse_authority_id, $editingCourseId, $editingInstitute, $editingExecutor, $editingAircraft, $editingReference, $editingStartDate, $editingEndDate, $editingValidupto, $editingCertificate_image, $editingTranscript_image;
    
    
    public function resetForm()
    {
        $this->course_id = '';
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
        'start_date.required'=>'Crew course description must.',
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
        $proficiency->employee_id = Employee::where('user_id', Auth::user()->id)->first()->id;
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
        $data['courses'] = Course::get();
        $data['coursesAuths'] = CourseAuthority::get();
        $data['proficiencies'] = Proficiency::with(['employee','course'])->get();
        return view('livewire.proficiency-add-component',['data'=>$data]);
    }
}
