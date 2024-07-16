<div>
    <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-courseEntry-tab" data-bs-toggle="pill" data-bs-target="#pills-courseEntry" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Enter course</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-allCourseForAll-tab" data-bs-toggle="pill" data-bs-target="#pills-allCourseForAll" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Course for all</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-allTraining-tab" data-bs-toggle="pill" data-bs-target="#pills-allTraining" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Training</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-training-seep-tab" data-bs-toggle="pill" data-bs-target="#pills-training-seep" type="button" role="tab" aria-controls="pills-training-seep" aria-selected="false">Training - SEEP</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-courseEntry" role="tabpanel" aria-labelledby="pills-courseEntry-tab" tabindex="0">
            <div class="card shadow border-info mt-2" >
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-8">
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif 
                    <form wire:submit.prevent="storeProficiency">  
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="employee_id">    
                                        <option selected>Select crew</option>
                                        @foreach($data['employee'] as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                        @endforeach
                                        <!-- <option value="NotListed">Not listed ?</option> -->
                                    </select>
                                    <label for="floatingSelect">Employee name</label>
                                    @error('employee_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="course_type_id">    
                                        <option selected>Select course type</option>
                                        @foreach($data['coursesTypes'] as $coursesType)
                                        <option value="{{$coursesType->id}}">{{$coursesType->courseType}}</option>
                                        @endforeach
                                        <!-- <option value="NotListed">Not listed ?</option> -->
                                    </select>
                                    <label for="floatingSelect">Course type</label>
                                    @error('course_type_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="course_id">    
                                        <option selected>Select course name</option>
                                        @foreach($data['courses'] as $course)
                                        <option value="{{$course->id}}">{{$course->course_name_short}}</option>
                                        @endforeach
                                        <option value="NotListed">Not listed ?</option>
                                    </select>
                                    <label for="floatingSelect">Course name</label>
                                    @error('course_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="course_authority_id">    
                                        <option selected>Select Board / Authority</option>
                                        @foreach($data['coursesAuths'] as $coursesAuth)
                                        <option value="{{$coursesAuth->id}}">{{$coursesAuth->name}}</option>
                                        @endforeach
                                        <option value="NotListed">Not listed ?</option>
                                    </select>
                                    <label for="floatingSelect">Board / Authority</label>
                                    @error('course_authority_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                        </div> 
                        <div class="row mb-3"> 
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model.live="institute" id="floatingInput" placeholder="name@example.com" >
                                    <label for="floatingInput">Institute</label>
                                    @error('institute')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>                            
                            </div>  
                            <div class="col">                              
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"  wire:model.live="executor" id="floatingInput" placeholder="name@example.com" >
                                    <label for="floatingInput">Executor / Responsible person</label>
                                    @error('executor')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="aircraft"  id="floatingInput"  placeholder="Aircraft Boeing-787" >
                                    <label for="floatingInput">Aircraft</label>
                                    @error('aircraft')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="reference"   placeholder="Aircraft Boeing-787" >
                                    <label for="floatingSelect">Reference</label>
                                    @error('reference')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                        </div> 
                        <div class="row mb-3">  
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="start_date">
                                    <label for="floatingSelect">Starts</label>
                                    @error('start_date')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>   
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="end_date">
                                    <label for="floatingSelect">Ends</label>
                                    @error('end_date')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="validupto">
                                    <label for="floatingSelect">Valid upto</label>
                                    @error('validupto')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>  
                        </div>  
                        <div class="row mb-3">                  
                            <div class="col">
                                <div class="form-floating">    
                                    @if(isset($data['proficiencies']->certificate_image))
                                    <img src="{{ asset('uploads/certificateImage/'.$data['proficiencies']->certificate_image) }} " width="300" /> 
                                    @endif                 
                                    @if ($certificate_image)
                                    <img src="{{$certificate_image->temporaryUrl()}}" width="300">
                                    @endif 

                                    <input type="file" class="form-control" wire:model.live="certificate_image">
                                    <label for="floatingSelect">Upload Certificate</label>
                                    @error('certificate_image')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <div class="form-floating">                             
                                    @if(isset($data['proficiencies']->transcript_image))
                                    <img src="{{ asset('uploads/transcriptImage/'.$data['proficiencies']->transcript_image) }} " width="300" /> 
                                    @endif                 
                                    @if ($transcript_image)
                                    <img src="{{$transcript_image->temporaryUrl()}}" width="300">
                                    @endif 
                                    <input type="file" class="form-control" wire:model.live="transcript_image">
                                    <label for="floatingSelect">Upload Transcript </label>
                                    @error('transcript_image')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>     
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary form-control">Save</button>
                            </div>
                        </div>      
                    </form>    
                        
                </div>                         
            </div>   

            <!-- open modal course Auth-->
            @if($course_authority_id === "NotListed")
                <div class="modal show shadow" tabindex="-1" role="dialog" style="display: block;" >
                    <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content ">  
                            <div class="modal-header">
                                <h5 class="modal-title"> Add Board or Authority</h5>
                                <i  wire:click="resetForm" class="bi bi-x-lg btn btn-outline-danger"></i>
                                <!-- <svg wire:click="resetForm" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg> -->
                            </div>
                            <div class="modal-body">
                                <livewire:course-authority/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- open modal course-->
            @if($course_id === "NotListed")
                <div class="modal show shadow" tabindex="-1" role="dialog" style="display: block;" >
                    <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content ">  
                            <div class="modal-header">
                                <h5 class="modal-title"> Course Name</h5>
                                <i  wire:click="resetForm" class="bi bi-x-lg btn btn-outline-danger"></i>
                                <!-- <svg wire:click="resetForm" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg> -->
                            </div>
                            <div class="modal-body">
                                <livewire:course/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                <!-- <div class="modal-backdrop fade show"></div> -->   
        </div>
        <div class="tab-pane fade show " id="pills-allCourseForAll" role="tabpanel" aria-labelledby="pills-allCourseForAll-tab" tabindex="0">
         <!-- all employee all course -->
            <table class="table table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course name</th>
                        <th>Course type</th>
                        <th>Board / Authority</th>
                        <th>Institute</th>
                        <th>Executor</th>
                        <th>Aircraft</th>
                        <th>Reference</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Valid upto</th>
                        <th>Certificate image</th>
                        <th>Transcript image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data['proficiencies'])>0)
                @foreach($data['proficiencies'] as $index=>$proficiencie)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourseId">    
                                        <option selected>Select course name</option>
                                        @foreach($data['courses'] as $course)
                                        <option value="{{$course->id}}">{{$course->course_name_short}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Course</label>
                                    @error('editingCourseId')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>   
                            @else
                            {{$proficiencie->course->course_name_short}}
                            @endif
                        </td>
                        <td>
                            {{$proficiencie->course->courseType->courseType}}
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)    
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourse_authority_id">    
                                        <option selected>Select Board / Authority</option>
                                        @foreach($data['coursesAuths'] as $coursesAuth)
                                        <option value="{{$coursesAuth->id}}">{{$coursesAuth->name}}</option>
                                        @endforeach
                                        <option value="NotListed">Not listed ?</option>
                                    </select>
                                    <label for="floatingSelect">Board / Authority</label>
                                    @error('editingCourse_authority_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else                            
                            {{$proficiencie->courseAthority->name}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingInstitute">
                                    <label for="floatingSelect">Institute</label>
                                    @error('editingInstitute')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>   
                            @else                            
                            {{$proficiencie->institute}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingExecutor">
                                    <label for="floatingSelect">Executor / Responsible person</label>
                                    @error('editingExecutor')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else                            
                            {{$proficiencie->executor}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingAircraft">
                                    <label for="floatingSelect">Starts</label>
                                    @error('editingAircraft')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>                                 
                            @else
                            {{$proficiencie->aircraft}}
                            @endif                            
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingReference">
                                    <label for="floatingSelect">Reference</label>
                                    @error('editingReference')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>                                
                            @else
                            {{$proficiencie->reference}}
                            @endif                            
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingStartDate">
                                    <label for="floatingSelect">Starts</label>
                                    @error('editingStartDate')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                               
                            @else
                            {{$proficiencie->start_date}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingEndDate">
                                    <label for="floatingSelect">Ends</label>
                                    @error('editingEndDate')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                               
                            @else
                            {{$proficiencie->end_date}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingValidupto">
                                    <label for="floatingSelect">Valid upto</label>
                                    @error('editingValidupto')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else
                            {{$proficiencie->validupto}}
                            @endif
                        </td>
                        <td>
                        <img src="{{ asset('uploads/certificateImage/'.$proficiencie->certificate_image) }} " width="90" alt="Certificate" />                          
                        </td>
                        <td>                             
                        <img src="{{ asset('uploads/transcriptImage/'.$proficiencie->transcript_image) }} " width="90" alt="Transcript" />   
                        </td>
                        <td>   
                            <span class="toottipwrapper">
                            @if($editIt === $proficiencie->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$proficiencie->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else     
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$proficiencie->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$proficiencie->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                            </span>  
                            @endif
                            </span>
                        </td>
                    </tr>
                @endforeach
                @else
                <span>No proficiency found</span>
                @endif
                </tbody>
            </table>  
        </div>
        <div class="tab-pane fade" id="pills-allTraining" role="tabpanel" aria-labelledby="pills-allTraining-tab" tabindex="0">
            <!-- all employee training -->
            <table class="table table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee name</th>
                        <th>Course name</th>
                        <th>Course type</th>
                        <th>Board / Authority</th>
                        <th>Institute</th>
                        <th>Executor</th>
                        <th>Aircraft</th>
                        <th>Reference</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Valid upto</th>
                        <th>Certificate image</th>
                        <th>Transcript image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data['trainings'])>0)
                @foreach($data['trainings'] as $index=>$proficiencie)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            {{$proficiencie->employee->first_name}}
                            {{$proficiencie->employee->last_name}}
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourseId">    
                                        <option selected>Select course name</option>
                                        @foreach($data['courses'] as $course)
                                        <option value="{{$course->id}}">{{$course->course_name_short}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Course</label>
                                    @error('editingCourseId')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>   
                            @else
                            {{$proficiencie->course->course_name_short}}
                            @endif
                        </td>
                        <td>
                            {{$proficiencie->course->courseType->courseType}}
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)    
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourse_authority_id">    
                                        <option selected>Select Board / Authority</option>
                                        @foreach($data['coursesAuths'] as $coursesAuth)
                                        <option value="{{$coursesAuth->id}}">{{$coursesAuth->name}}</option>
                                        @endforeach
                                        <option value="NotListed">Not listed ?</option>
                                    </select>
                                    <label for="floatingSelect">Board / Authority</label>
                                    @error('editingCourse_authority_id')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else                            
                            {{$proficiencie->courseAthority->name}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingInstitute">
                                    <label for="floatingSelect">Institute</label>
                                    @error('editingInstitute')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>   
                            @else                            
                            {{$proficiencie->institute}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id)
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingExecutor">
                                    <label for="floatingSelect">Executor / Responsible person</label>
                                    @error('editingExecutor')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else                            
                            {{$proficiencie->executor}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingAircraft">
                                    <label for="floatingSelect">Starts</label>
                                    @error('editingAircraft')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>                                 
                            @else
                            {{$proficiencie->aircraft}}
                            @endif                            
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="text" class="form-control"  wire:model.live="editingReference">
                                    <label for="floatingSelect">Reference</label>
                                    @error('editingReference')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>                                
                            @else
                            {{$proficiencie->reference}}
                            @endif                            
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingStartDate">
                                    <label for="floatingSelect">Starts</label>
                                    @error('editingStartDate')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                               
                            @else
                            {{$proficiencie->start_date}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingEndDate">
                                    <label for="floatingSelect">Ends</label>
                                    @error('editingEndDate')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                               
                            @else
                            {{$proficiencie->end_date}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencie->id) 
                                <div class="form-floating">
                                    <input type="date" class="form-control" wire:model.live="editingValidupto">
                                    <label for="floatingSelect">Valid upto</label>
                                    @error('editingValidupto')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror 
                                </div>  
                            @else
                            {{$proficiencie->validupto}}
                            @endif
                        </td>
                        <td>
                        <img src="{{ asset('uploads/certificateImage/'.$proficiencie->certificate_image) }} " width="90" alt="Certificate" />                          
                        </td>
                        <td>                             
                        <img src="{{ asset('uploads/transcriptImage/'.$proficiencie->transcript_image) }} " width="90" alt="Transcript" />   
                        </td>
                        <td>   
                            <span class="toottipwrapper">
                            @if($editIt === $proficiencie->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$proficiencie->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else     
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$proficiencie->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$proficiencie->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                            </span>  
                            @endif
                            </span>
                        </td>
                    </tr>
                @endforeach
                @else
                <span>No proficiency found</span>
                @endif
                </tbody>
            </table>               
        </div>
        <div class="tab-pane fade" id="pills-training-seep" role="tabpanel" aria-labelledby="pills-training-seep-tab" tabindex="0">
            <!-- all employee training-SEEP -->
            <table class="table table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee name</th>
                        <th>Course name</th>
                        <th>Board / Authority</th>
                        <th>Institute</th>
                        <th>Executor</th>
                        <th>Aircraft</th>
                        <th>Reference</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Valid upto</th>
                        <th>Certificate image</th>
                        <th>Transcript image</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data['trainings-seep'])>0)
                    @foreach($data['trainings-seep'] as $index=>$proficiencie)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                {{$proficiencie->employee->first_name}}
                                {{$proficiencie->employee->last_name}}
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id)
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourseId">    
                                            <option selected>Select course name</option>
                                            @foreach($data['courses'] as $course)
                                            <option value="{{$course->id}}">{{$course->course_name_short}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Course</label>
                                        @error('editingCourseId')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>   
                                @else
                                {{$proficiencie->course->course_name_short}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id)    
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingCourse_authority_id">    
                                            <option selected>Select Board / Authority</option>
                                            @foreach($data['coursesAuths'] as $coursesAuth)
                                            <option value="{{$coursesAuth->id}}">{{$coursesAuth->name}}</option>
                                            @endforeach
                                            <option value="NotListed">Not listed ?</option>
                                        </select>
                                        <label for="floatingSelect">Board / Authority</label>
                                        @error('editingCourse_authority_id')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                @else                            
                                {{$proficiencie->courseAthority->name}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id)
                                    <div class="form-floating">
                                        <input type="text" class="form-control"  wire:model.live="editingInstitute">
                                        <label for="floatingSelect">Institute</label>
                                        @error('editingInstitute')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>   
                                @else                            
                                {{$proficiencie->institute}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id)
                                    <div class="form-floating">
                                        <input type="text" class="form-control"  wire:model.live="editingExecutor">
                                        <label for="floatingSelect">Executor / Responsible person</label>
                                        @error('editingExecutor')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                @else                            
                                {{$proficiencie->executor}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id) 
                                    <div class="form-floating">
                                        <input type="date" class="form-control" wire:model.live="editingAircraft">
                                        <label for="floatingSelect">Starts</label>
                                        @error('editingAircraft')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>                                 
                                @else
                                {{$proficiencie->aircraft}}
                                @endif                            
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id) 
                                    <div class="form-floating">
                                        <input type="text" class="form-control"  wire:model.live="editingReference">
                                        <label for="floatingSelect">Reference</label>
                                        @error('editingReference')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>                                
                                @else
                                {{$proficiencie->reference}}
                                @endif                            
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id) 
                                    <div class="form-floating">
                                        <input type="date" class="form-control" wire:model.live="editingStartDate">
                                        <label for="floatingSelect">Starts</label>
                                        @error('editingStartDate')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                
                                @else
                                {{$proficiencie->start_date}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id) 
                                    <div class="form-floating">
                                        <input type="date" class="form-control" wire:model.live="editingEndDate">
                                        <label for="floatingSelect">Ends</label>
                                        @error('editingEndDate')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                
                                @else
                                {{$proficiencie->end_date}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $proficiencie->id) 
                                    <div class="form-floating">
                                        <input type="date" class="form-control" wire:model.live="editingValidupto">
                                        <label for="floatingSelect">Valid upto</label>
                                        @error('editingValidupto')
                                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                @else
                                {{$proficiencie->validupto}}
                                @endif
                            </td>
                            <td>
                            <img src="{{ asset('uploads/certificateImage/'.$proficiencie->certificate_image) }} " width="90" alt="Certificate" />                          
                            </td>
                            <td>                             
                            <img src="{{ asset('uploads/transcriptImage/'.$proficiencie->transcript_image) }} " width="90" alt="Transcript" />   
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <span>No proficiency found</span>
                    @endif
                </tbody>
            </table> 
        </div> 
    </div>  
</div>
