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
            <div class="card-title"><h5 class="card-title">Proficiency type</h5></div>   
            <form wire:submit.prevent="storeProficiencyType">  
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="profiencyType">
                                <option selected>Select profiency type</option>
                                <option value="Basic Education">Basic Education</option>
                                <option value="Course">Course</option>
                                <option value="Training">Training</option>
                                <option value="Licence">Licence</option>
                                <option value="Diploma">Diploma</option>
                            </select>
                        <label for="floatingSelect">Email type</label>
                        </div>    
                    </div>
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="description" class="form-control" id="floatingInput" placeholder="Enter description" wire:model="description">
                            <label for="floatingInput">Description</label>
                        </div>
                    </div>
                    <div class="col">
                    <button type="submit" class="btn btn-outline-primary form-control">Add proficiency</button>
                    </div>
                </div>      
            </form>    
            <!-- start table -->
            
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Proficiency Type</th>
                        <th>Description</th>
                        <th>Added by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data['proficiencyTypes'])>0)
                @foreach($data['proficiencyTypes'] as $index=>$proficiencyType)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @if($editIt === $proficiencyType->id)
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingProficiencyType">
                                        <option selected>Select profiency type</option>
                                        <option value="Basic Education">Basic Education</option>
                                        <option value="Course">Course</option>
                                        <option value="Training">Training</option>
                                        <option value="Licence">Licence</option>
                                        <option value="Diploma">Diploma</option>
                                    </select>
                                    <label for="floatingSelect">Proficiency type</label>
                                </div>  
                            @else
                            {{$proficiencyType->profiencyType}}
                            @endif
                        </td>
                        <td>
                            @if($editIt === $proficiencyType->id)
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="editingDescription">
                                    <label for="floatingInput">Proficiency Type</label>
                                </div>
                            @else
                            {{$proficiencyType->description}}
                            @endif
                        </td>
                        <td>{{$proficiencyType->employee->first_name}}</td>
                        <td>   
                            <span class="toottipwrapper">
                            @if($editIt === $proficiencyType->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$proficiencyType->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else     
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$proficiencyType->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$proficiencyType->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
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
