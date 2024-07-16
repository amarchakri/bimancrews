<div>
    @if(isset($data['profile']->designations))
        @if($data['profile']->designations->count()>0)           
            <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Designation name</th>
                            <th>Starts</th>
                            <th>Ends</th>
                            <th>Duty type</th>
                            <th>Reason</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['profile']->designations as $index=>$bdesignation) 
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                @if($editIt === $bdesignation->id) 
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingDesignation_id">
                                        <option selected>Select base designation</option>
                                        @foreach($data['allDesignations'] as $bdesignation)
                                        <option value="{{$bdesignation->id}}">{{$bdesignation->short_designation}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Base Designation</label>
                                </div> 
                                @else
                                {{$bdesignation->short_designation}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $bdesignation->id)
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model.live="editingDuty_from">
                                    <label for="floatingSelect">Duty starts</label>
                                </div>
                                @else
                                {{$bdesignation->pivot->duty_from}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $bdesignation->id)
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model.live="editingDuty_to">
                                    <label for="floatingSelect">Duty ends</label>
                                </div>
                                @else
                                {{$bdesignation->pivot->duty_to}}
                                @endif 
                            </td>
                            <td>
                                @if($editIt === $bdesignation->id)
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingType">
                                        <option selected>Select designation type</option>
                                        <option value="1">Base designation</option>
                                        <option value="2">Additional charge</option>
                                        <option value="3">Position hold</option>
                                        <option value="4">Acting designation</option>
                                    </select>
                                    <label for="floatingSelect">Designation type</label>
                                </div> 
                                @else
                                    @if($bdesignation->pivot->type==1)
                                    <span>Base designation</span>
                                    @elseif($bdesignation->pivot->type==2)
                                    <span>Additional charge</span>
                                    @elseif($bdesignation->pivot->type==3)
                                    <span>Position hold</span>
                                    @elseif($bdesignation->pivot->type==4)
                                    <span>Acting designation</span>
                                    @else
                                    <span>Designation type not mentioned</span>
                                    @endif
                                
                                @endif                              
                            </td>
                            <td>
                                @if($editIt === $bdesignation->id) 
                                <div class="form-floating mb-3">
                                    <input type="tex" class="form-control" wire:model.live="editingReason">
                                    <label for="floatingSelect">Reason / Comment</label>
                                </div>
                                @else
                                {{$bdesignation->pivot->reason}}
                                @endif                              
                            </td>
                            <td>   
                                <span class="toottipwrapper">
                                @if($editIt === $bdesignation->id)  
                                <span class="icon update">        
                                <span class="tooltip">Update</span>              
                                <i wire:click.prevent = "update({{$bdesignation->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                                </span>                      
                                <span class="icon cancel">
                                <span class="tooltip">Cancel</span> 
                                <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                                </span> 
                                @else     
                                <span class="icon edit">   
                                <span class="tooltip">Edit</span>                                    
                                <i wire:click.prevent = "edit({{$bdesignation->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                                </span>                                        
                                <span class="icon delete">
                                <span class="tooltip">Delete</span>                        
                                <i wire:click.prevent = "delete({{$bdesignation->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                                </span>  
                                @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
        @else
            <div class="card shadow border-info" >
                    @if (session()->has('success'))
                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-8">
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif  
                <div class="card-body">
                    <form  wire:submit.prevent="storebaseDesignations">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="designation_id">
                                        <option selected>Select base designation</option>
                                        @foreach($data['allDesignations'] as $bdesignation)
                                        <option value="{{$bdesignation->id}}">{{$bdesignation->short_designation}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Base Designation</label>
                                </div> 
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model.live="duty_from">
                                    <label for="floatingSelect">Duty starts</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model.live="duty_to">
                                    <label for="floatingSelect">Duty ends</label>
                                </div>                        
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="tex" class="form-control" wire:model.live="reason">
                                    <label for="floatingSelect">Reason / Comment</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="type">
                                        <option selected>Select designation type</option>
                                        <option value="1">Base designation</option>
                                        <option value="2">Additional charge</option>
                                        <option value="3">Position hold</option>
                                        <option value="4">Acting designation</option>
                                    </select>
                                    <label for="floatingSelect">Designation type</label>
                                </div> 
                                <div class="form-floating mb-3">
                                    <button type="submit" class="form-control btn-outline-info">Assign designation</button>
                                </div>                        
                            </div>
                        </div>
                    </form>      
                </div>
            </div>                           
        @endif
    @endif
</div>
