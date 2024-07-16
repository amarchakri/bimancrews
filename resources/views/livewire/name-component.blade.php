<div>
    <div class="row">
        <div class="col">
        <div class="card shadow border-info" >
            <div class="card-body">
            <!-- <h5 class="card-title">Name</h5> -->
                @if(isset($data['profile']->first_name) || isset($data['profile']->last_name))
                @if($editNamesId === $data['profile']->id)
                <form wire:submit.prevent="updateNames">
                    <div  class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="editingfirst_name" class="form-control" id="editingfirst_name" aria-describedby="first_nameHelp" placeholder="Enter your first name">
                                    @error('editingfirst_name')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror  
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="editingmiddle_name" class="form-control" id="editingmiddle_name" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                    @error('editingmiddle_name')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror                        
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="editingmiddle_nameCheckbox" wire:model="editingmiddle_nameCheckbox">
                                    <label class="form-check-label" for="editingmiddle_nameCheckbox">Not Applicable</label>
                                    </div>                    
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="editinglast_name" class="form-control" id="editinglast_name" aria-describedby="editinglast_nameHelp" placeholder="Enter your last name">
                                    @error('editinglast_name')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror   
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="editingroster_name"  class="form-control" id="editingroster_name" aria-describedby="editingroster_nameHelp" placeholder="Your roster/nick/called name">
                                    @error('editingroster_name')
                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                    @enderror                       
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="editingroster_nameCheckbox" wire:model="editingroster_nameCheckbox">
                                    <label class="form-check-label" for="editingroster_nameCheckbox">Not Applicable</label>
                                    </div>       
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </div>  
                </form>               
                @else
                <div class="row">
                    <div class="col">
                    <h5>
                    <span>{{$data['profile']->first_name}}</span>                   
                    @if($data['profile']->middle_name!='N/A')
                    <span>{{$data['profile']->middle_name}}</span>
                    @else
                    <span></span>
                    @endif
                    <span>{{$data['profile']->last_name}}</span> 
                    @if($data['profile']->roster_name!='N/A')
                    <span>{{$data['profile']->roster_name}}</span>
                    @else
                    <span></span>
                    @endif
                    </h5>
                    </div>
                    <div class="col">
                        <button wire:click="editNames({{$data['profile']->id}})" class="btn btn-outline-warning btn-sm float-right"><i class="bi bi-pencil"></i>Edit</button>
                    </div>
                </div>
                @endif
                @else
                <form wire:submit.prevent="storeNames">
                    <div  class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="first_name" class="form-control" id="first_name" aria-describedby="first_nameHelp" placeholder="Enter your first name">
                                @error('first_name')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror  
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="middle_name" class="form-control" id="middle_name" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                @error('middle_name')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="middle_nameCheckbox" wire:model="middle_nameCheckbox">
                                    <label class="form-check-label" for="middle_nameCheckbox">Not Applicable</label>
                                </div>                    
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="last_name" class="form-control" id="last_name" aria-describedby="last_nameHelp" placeholder="Enter your last name">
                                @error('last_name')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror   
                            </div>                    
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" wire:model="roster_name"  class="form-control" id="roster_name" aria-describedby="roster_nameHelp" placeholder="Your roster/nick/called name">
                                @error('roster_name')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror                       
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="roster_nameCheckbox" wire:model="roster_nameCheckbox">
                                    <label class="form-check-label" for="roster_nameCheckbox">Not Applicable</label>
                                </div>       
                            </div>                    
                        </div>
                        <div class="col">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                        </div>
                        </div>
                    </div>  
                </form> 
                @endif                         
            </div>
        </div>           
        </div>
    </div> 
</div>
