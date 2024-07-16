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
            @if(count($data['basicEducations'])>0)
            @foreach($data['basicEducations'] as $index=>$basicEducation)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>
                        @if($editIt === $basicEducation->id)
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingType">
                                    <option selected>Select basicEducation type</option>
                                    <option value="Official">Official</option>
                                    <option value="Public">Public</option>
                                </select>
                            <label for="floatingSelect">Phone type</label>
                            </div>  
                        @else
                        {{$basicEducation->course->course_name_short}}
                        @endif
                    </td>
                    <td>
                        @if($editIt === $basicEducation->id)
                            <div class="form-floating mb-3">
                                <input type="basicEducation" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="editingbasicEducation">
                                <label for="floatingInput">basicEducation Address</label>
                            </div>
                        @else
                        Institute
                        @endif
                    </td>
                    <td>
                        @if($editIt === $basicEducation->id)                        
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingSelect" aria-label="Floating label select example"  wire:model.live="start_date">
                        <label for="floatingSelect">Priority</label>
                        </div> 
                        @else
                        {{$basicEducation->start_date}}
                        @endif
                    </td>
                    <td>
                        @if($editIt === $basicEducation->id)                        
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingSelect" aria-label="Floating label select example"  wire:model.live="end_date">
                        <label for="floatingSelect">Priority</label>
                        </div> 
                        @else
                        {{$basicEducation->start_date}}
                        @endif
                    </td>
                    <td>   
                        <span class="toottipwrapper">
                        @if($editIt === $basicEducation->id)  
                        <span class="icon update">        
                        <span class="tooltip">Update</span>              
                        <i wire:click.prevent = "update({{$basicEducation->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                        </span>                      
                        <span class="icon cancel">
                        <span class="tooltip">Cancel</span> 
                        <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                        </span> 
                        @else     
                        <span class="icon edit">   
                        <span class="tooltip">Edit</span>                                    
                        <i wire:click.prevent = "edit({{$basicEducation->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                        </span>                                        
                        <span class="icon delete">
                        <span class="tooltip">Delete</span>                        
                        <i wire:click.prevent = "delete({{$basicEducation->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                        </span>  
                        @endif
                        </span>
                    </td>
                </tr>
            @endforeach
            @else
            <span>No basicEducation address found</span>
            @endif
            </tbody>
        </table>      
</div>
