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
    <!-- <div class="card-title"><h5 class="card-title">Phones</h5></div>    -->
    <form wire:submit.prevent="storePhone">  
        <div class="row">
            <div class="col">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="type">
                        <option selected>Select phone type</option>
                        <option value="Home">Home</option>
                        <option value="Office Direct">Office Direct</option>
                        <option value="Office Extension">Office Extension</option>
                        <option value="Office Cell">Office Cell</option>
                        <option value="Personal Cell">Personal Cell</option>
                        <option >
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                            </button>
                        </option>
                    </select>
                <label for="floatingSelect">Phone type</label>
                </div>    
            </div>
            <div class="col">  
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="number">
                    <label for="floatingInput">Phone number</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  wire:model="availability">
                        <option selected>Suitable engage time</option>
                        <option value="Morning">Morning</option>
                        <option value="Day">Day</option>
                        <option value="Evening">Evening</option>
                        <option value="Office hour">Office hour</option>
                        <option value="Off day">Off day</option>
                    </select>
                <label for="floatingSelect">Availability</label>
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
                <th>Type</th>
                <th>Number</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($data['phones'])>0)
        @foreach($data['phones'] as $index=>$phone)
            <tr>
                <td>{{$index+1}}</td>
                <td>
                    @if($editIt === $phone->id)
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model="editingType">
                                <option selected>Select phone type</option>
                                <option value="Home">Home</option>
                                <option value="Office Direct">Office Direct</option>
                                <option value="Office Extension">Office Extension</option>
                                <option value="Office Cell">Office Cell</option>
                                <option value="Personal Cell">Personal Cell</option>
                            </select>
                        <label for="floatingSelect">Phone type</label>
                        </div>  
                    @else
                    {{$phone->type}}
                    @endif
                </td>
                <td>
                    @if($editIt === $phone->id)
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Enter phone number" wire:model="editingNumber">
                            <label for="floatingInput">Phone type</label>
                        </div>
                    @else
                    {{$phone->number}}
                    @endif
                </td>
                <td>
                    @if($editIt === $phone->id)                        
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  wire:model="editingAvailability">
                            <option selected>Your suitable time to engage</option>
                            <option value="Morning">Morning</option>
                            <option value="Day">Day</option>
                            <option value="Evening">Evening</option>
                            <option value="Office hour">Office hour</option>
                            <option value="Off day">Off day</option>
                        </select>
                    <label for="floatingSelect">Availability</label>
                    </div> 
                    @else
                    {{$phone->availability}}
                    @endif
                </td>
                <td>   
                    <span class="toottipwrapper">
                    @if($editIt === $phone->id)  
                    <span class="icon update">        
                    <span class="tooltip">Update</span>              
                    <i wire:click.prevent = "update({{$phone->id}})" class="bi bi-pencil-square btn btn-outline-info btn-sm"></i>                        
                    </span>                      
                    <span class="icon cancel">
                    <span class="tooltip">Cancel</span> 
                    <i wire:click.prevent = "resetForm" class="bi bi-x-circle btn btn-outline-secondary btn-sm"></i>                        
                    </span> 
                    @else     
                    <span class="icon edit">   
                    <span class="tooltip">Edit</span>                                    
                    <i wire:click.prevent = "edit({{$phone->id}})" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></i>
                    </span>                                        
                    <span class="icon delete">
                    <span class="tooltip">Delete</span>                        
                    <i wire:click.prevent = "delete({{$phone->id}})" class="bi bi-x-circle btn btn-outline-warning btn-sm"></i>                        
                    </span>  
                    @endif
                    </span>
                </td>
            </tr>
        @endforeach
        @else
        <span>No phone information found</span>
        @endif
        </tbody>
    </table> 
    </div>
    </div>

    <!-- modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>     
    <!-- modal -->

</div>
 