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
    <!-- <div class="card-title"><h5 class="card-title">institutes</h5></div>    -->
    <form wire:submit.prevent="storeInstitute">  
        <div class="row">
            <div class="col">  
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter institute institute name" wire:model="institute_name">
                    <label for="floatingInput">Institute name</label>
                    @error('institute_name')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                </div>
            </div>
            <div class="col">  
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter institute institute name" wire:model="address">
                    <label for="floatingInput">Institute address</label>
                    @error('address')
                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                    @enderror  
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
        </div>      
    </form>
    <table class="table table-bordered border-primary table-sm">
        <thead>
            <tr>
                <th>SL</th>
                <th>Institute</th>
                <th>Address</th>
                <th>Added by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($data['institutes'])>0)
        @foreach($data['institutes'] as $index=>$institute)
            <tr>
                <td>{{$index+1}}</td>
                <td>
                    @if($editIt === $institute->id)
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter institute name" wire:model="editingInstituteName">
                            <label for="floatingInput">Institute name</label>
                            @error('editingInstituteName')
                            <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                            @enderror  
                        </div>  
                    @else
                    {{$institute->institute_name}}
                    @endif
                </td>
                <td>
                    @if($editIt === $institute->id)
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter institute address" wire:model="editingAddress">
                            <label for="floatingInput">Institute address</label>
                        </div>
                    @else
                    {{$institute->address}}
                    @endif
                </td>
                <td>
                    {{$institute->employee->first_name}}
                </td>
                <td>   
                    <span class="toottipwrapper">
                    @if($editIt === $institute->id)  
                    <span class="icon update">        
                    <span class="tooltip">Update</span>              
                    <i wire:click.prevent = "update({{$institute->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                    </span>                      
                    <span class="icon cancel">
                    <span class="tooltip">Cancel</span> 
                    <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                    </span> 
                    @else     
                    <span class="icon edit">   
                    <span class="tooltip">Edit</span>                                    
                    <i wire:click.prevent = "edit({{$institute->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                    </span>                                        
                    <span class="icon delete">
                    <span class="tooltip">Delete</span>                        
                    <i wire:click.prevent = "delete({{$institute->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                    </span>  
                    @endif
                    </span>
                </td>
            </tr>
        @endforeach
        @else
        <span>No institute information found</span>
        @endif
        </tbody>
    </table> 
    </div>
    </div>

</div>
 