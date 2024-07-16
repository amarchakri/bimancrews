<div>

    <div class="card shadow border-info" >
        <div class="card-body">    
            @if (session()->has('message'))
                <div class="row justify-content-center text-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif        
            <div class="card-title"><h5 class="card-title">Course entry</h5></div>   
            <form wire:submit.prevent="storeCourse">  
                <div class="row">
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter description" wire:model.live="course_name_short">
                            <label for="floatingInput">Course name in short</label>
                    @error('course_name_short')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                        </div>
                    </div>
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter Course name in long" wire:model.live="course_name_long">
                            <label for="floatingInput">Course name in long</label>
                    @error('course_name_long')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                        </div>
                    </div>
                </div>
                <div class="row">    
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter description" wire:model.live="description">
                            <label for="floatingInput">Description</label>
                    @error('description')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                        </div>
                    </div>
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Enter description" wire:model.live="duration_number">
                            <label for="floatingInput">Duration in number</label>
                    @error('duration_number')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                        </div>
                    </div>
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="duration_in">
                                <option selected>Select duration in</option>
                                <option value="Day">Day</option>
                                <option value="Week">Week</option>
                                <option value="Month">Month</option>
                                <option value="Year">Year</option>
                            </select>
                            <label for="floatingInput">Duration in </label>
                    @error('duration_in')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                        </div>
                    </div>
                </div> 
                    <div class="col mb-3">
                        <button type="submit" class="btn btn-outline-primary form-control">Add course</button>
                    </div>     
            </form>    
            <!-- start table -->
            
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course, short</th>
                        <th>Course, long</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Added by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data['courses'])>0)
                @foreach($data['courses'] as $index=>$course)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @if($editIt === $course->id) 
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter Course Name in short" wire:model="editingCourse_name_short">
                                    <label for="floatingInput">Course name in short</label>
                                </div>
                            @else
                            {{$course->course_name_short}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $course->id)
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter Course Name in long" wire:model="editingCourse_name_long">
                                    <label for="floatingInput">Course Name in long</label>
                                </div>
                            @else
                            {{$course->course_name_long}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $course->id) 
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Enter description" wire:model="editingDescription">
                                <label for="floatingInput">Description</label>
                            </div>
                            @else
                            {{$course->description}}
                            @endif 
                        </td>
                        <td>
                            @if($editIt === $course->id) 
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Enter description" wire:model="editingDuration_number">
                                <label for="floatingInput">Duration in number</label>
                            </div>
                            @else
                            {{$course->duration_number}}
                            @endif    

                            @if($editIt === $course->id)                             
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingDuration_in">
                                        <option selected>Select duration in</option>
                                        <option value="Day">Day</option>
                                        <option value="Week">Week</option>
                                        <option value="Month">Month</option>
                                        <option value="Year">Year</option>
                                    </select>
                                    <label for="floatingInput">Duration in </label>
                                </div>
                            @else
                            {{$course->duration_in}}
                            @endif                            
                        </td>
                        <td>{{$course->employee->first_name}}</td>
                        <td>   
                            <span class="toottipwrapper">
                            @if($editIt === $course->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$course->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else     
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$course->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$course->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                            </span>  
                            @endif
                            </span>
                        </td>
                    </tr>
                @endforeach
                @else
                <span>No proficiency type information found</span>
                @endif
                </tbody>
            </table>         
        </div>                         
    </div>   

</div>
