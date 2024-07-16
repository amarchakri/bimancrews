<div>
    <!-- start table -->
    <table class="table table-bordered border-primary mt-3">
        <thead>
            <tr>
                <th>#</th>
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
        <span>No proficiencie found</span>
        @endif
        </tbody>
    </table>                     
    
</div>