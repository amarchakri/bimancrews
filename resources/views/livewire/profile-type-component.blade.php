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
            <div class="card-title"><h5 class="card-title">Emails</h5></div>   
            <form wire:submit.prevent="storeEmail">  
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="type">
                                <option selected>Select email type</option>
                                <option value="Official">Official</option>
                                <option value="Public">Public</option>
                            </select>
                        <label for="floatingSelect">Email type</label>
                        </div>    
                    </div>
                    <div class="col">  
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Enter email address" wire:model="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  wire:model="priority">
                                <option selected>Select priority</option>
                                <option value="Primary">Primary</option>
                                <option value="Alternative">Alternative</option>
                            </select>
                        <label for="floatingSelect">Priority</label>
                        </div> 

                    </div>
                    <button type="submit" class="btn btn-outline-primary form-control">Save</button>
                </div>      
            </form>    
            <!-- start table -->
            
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profile Type</th>
                            <th>Description</th>
                            <th>Added by</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['emails'])>0)
                    @foreach($data['emails'] as $index=>$email)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                @if($editIt === $email->id)
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingType">
                                            <option selected>Select email type</option>
                                            <option value="Official">Official</option>
                                            <option value="Public">Public</option>
                                        </select>
                                    <label for="floatingSelect">Phone type</label>
                                    </div>  
                                @else
                                {{$email->type}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $email->id)
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="editingEmail">
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                @else
                                {{$email->email}}
                                @endif
                            </td>
                            <td>
                                @if($editIt === $email->id)                        
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  wire:model="editingPriority">
                                        <option selected>Select priority</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Alternative">Alternative</option>
                                    </select>
                                <label for="floatingSelect">Priority</label>
                                </div> 
                                @else
                                {{$email->priority}}
                                @endif
                            </td>
                            <td>   
                                <span class="toottipwrapper">
                                @if($editIt === $email->id)  
                                <span class="icon update">        
                                <span class="tooltip">Update</span>              
                                <i wire:click.prevent = "update({{$email->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                                </span>                      
                                <span class="icon cancel">
                                <span class="tooltip">Cancel</span> 
                                <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                                </span> 
                                @else     
                                <span class="icon edit">   
                                <span class="tooltip">Edit</span>                                    
                                <i wire:click.prevent = "edit({{$email->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                                </span>                                        
                                <span class="icon delete">
                                <span class="tooltip">Delete</span>                        
                                <i wire:click.prevent = "delete({{$email->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
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
