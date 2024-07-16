<div>

    <!-- start table -->            
    <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>Institute</th>
                    <th>Start on</th>
                    <th>End on</th>
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
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingType">
                                    <option selected>Select course type</option>
                                    <option value="Official">Official</option>
                                    <option value="Public">Public</option>
                                </select>
                            <label for="floatingSelect">Phone type</label>
                            </div>  
                        @else
                        {{$course->course->course_name_short}}
                        @endif
                    </td>
                    <td>
                        @if($editIt === $course->id)
                            <div class="form-floating mb-3">
                                <input type="course" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="editingcourse">
                                <label for="floatingInput">course Address</label>
                            </div>
                        @else
                        {{$course->institute->institute_name}}
                        @endif
                    </td>
                    <td>
                        @if($editIt === $course->id)                        
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingSelect" aria-label="Floating label select example"  wire:model.live="start_date">
                        <label for="floatingSelect">Priority</label>
                        </div> 
                        @else
                        {{$course->start_date}}
                        @endif
                    </td>
                    <td>
                        @if($editIt === $course->id)                        
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingSelect" aria-label="Floating label select example"  wire:model.live="end_date">
                        <label for="floatingSelect">Priority</label>
                        </div> 
                        @else
                        {{$course->start_date}}
                        @endif
                    </td>
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
            <span>No course address found</span>
            @endif
            </tbody>
        </table>      
</div>
