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
                <form wire:submit.prevent="storeResponsibility">
                    <div  class="row">
                        <div class="col">
                            <div class="form-floating">
                            <input type="text" wire:model.live="responsibility_designation" class="form-control" id="responsibility_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                            <label for="floatingSelect">Responsibility Designation</label>
                            </div> 
                                @error('responsibility_designation')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Add responsibility</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                        </div>
                    </div>  
                </form>
                <!-- table -->    
                <table class="table table-bordered border-primary mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Responsibility</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['responsibilities'])>0)
                    @foreach($data['responsibilities'] as $index=>$responsibility)
                        <tr>
                            <td>{{$index+1}}</td>                            
                            <td>
                                @if($editResponsibilityId === $responsibility->id)
                                    <div class="form-floating">
                                        <input type="text" wire:model.live="editingSresponsibility_designation" class="form-control" id="short_designation" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                        <label for="floatingSelect">Short Designation</label>
                                    </div>  
                                @else
                                {{$responsibility->responsibility_designation}}
                                @endif
                            </td>
                            <td>   
                            <span class="toottipwrapper">
                            @if($editResponsibilityId === $responsibility->id)  
                            <span class="icon update">        
                            <span class="tooltip">Update</span>              
                            <i wire:click.prevent = "update({{$responsibility->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                            </span>                      
                            <span class="icon cancel">
                            <span class="tooltip">Cancel</span> 
                            <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                            </span> 
                            @else     
                            <span class="icon edit">   
                            <span class="tooltip">Edit</span>                                    
                            <i wire:click.prevent = "edit({{$responsibility->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                            </span>                                        
                            <span class="icon delete">
                            <span class="tooltip">Delete</span>                        
                            <i wire:click.prevent = "delete({{$responsibility->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
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