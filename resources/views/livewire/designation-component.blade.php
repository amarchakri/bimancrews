<div>
    <div class="row">
        <div class="col">
        <div class="card shadow border-info" >
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
            <!-- <h5 class="card-title">Name</h5> -->                
                <form wire:submit.prevent="storeDesignation">
                    <div  class="row">
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="short_designation" class="form-control" id="short_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                            <label for="floatingSelect">Short Designation</label>
                            </div> 
                                @error('short_designation')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="long_designation" class="form-control" id="long_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                            <label for="floatingSelect">Long Designation</label>
                            </div> 
                                @error('long_designation')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="pseudo_designation" class="form-control" id="pseudo_designation" aria-describedby="middle_nameHelp" placeholder="Enter pseudo designation">
                            <label for="floatingSelect">Pseudo Designation</label>
                            </div> 
                                @error('pseudo_designation')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                    </div>  
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="duty_bound" class="form-control" id="duty_bound" aria-describedby="middle_nameHelp" placeholder="Enter pseudo designation">
                            <label for="floatingSelect">Duty bound Designation</label>
                            </div> 
                                @error('duty_bound')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="payGroup" class="form-control" id="payGroup" aria-describedby="middle_nameHelp" placeholder="Enter pseudo designation">
                            <label for="floatingSelect">Pay Group</label>
                            </div> 
                                @error('payGroup')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="department" class="form-control" id="department" aria-describedby="middle_nameHelp" placeholder="Enter pseudo designation">
                            <label for="floatingSelect">Department</label>
                            </div> 
                                @error('department')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Add designation</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                        </div>                        
                    </div>
                </form>
                <!-- table -->    
                <table class="table table-bordered border-primary mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Designation in short</th>
                            <th>Designation in long</th>
                            <th>Pseudo Designation</th>
                            <th>Duty bound Designation</th>
                            <th>Pay Group</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['designations'])>0)
                    @foreach($data['designations'] as $index=>$designation)
                        <tr>
                            <td>{{$index+1}}</td>                            
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingShort_designation" class="form-control" id="short_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Short Designation</label>
                                    </div>  
                                @else
                                {{$designation->short_designation}}
                                @endif
                            </td>
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingLong_designation" class="form-control" id="short_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Long Designation</label>
                                    </div>  
                                @else
                                {{$designation->long_designation}}
                                @endif
                            </td>
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingpSeudo_designation" class="form-control" id="editingpSeudo_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Pseudo Designation</label>
                                    </div>  
                                @else
                                {{$designation->pseudo_designation}}
                                @endif
                            </td>
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingDuty_bound" class="form-control" id="editingDuty_bound" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Duty bound Designation</label>
                                    </div>  
                                @else
                                {{$designation->duty_bound}}
                                @endif
                            </td>
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingPayGroup" class="form-control" id="editingPayGroup" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Pay Group</label>
                                    </div>  
                                @else
                                {{$designation->payGroup}}
                                @endif
                            </td>
                            <td>
                                @if($editDesignationId === $designation->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingDepartment" class="form-control" id="editingDepartment" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Department</label>
                                    </div>  
                                @else
                                {{$designation->department}}
                                @endif
                            </td>
                            <td>   
                            <span class="toottipwrapper">
                            @if($editDesignationId === $designation->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$designation->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else      
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$designation->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$designation->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                            </span>  
                            @endif
                            </span>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <span>No email address found</span>
                    @endif
                    </tbody>
                </table>                                     
            </div>
        </div>           
        </div>
    </div> 
</div>