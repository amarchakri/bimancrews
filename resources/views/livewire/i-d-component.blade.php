<div> 
    <div class="row">
        <div class="col">
        <div class="card shadow border-info" >
            <div class="card-body">
            <!-- <h5 class="card-title">Name</h5> -->
                @if(isset($data['profile']->number_type) && isset($data['profile']->employee_no))
                @if($editId === $data['profile']->id)
                <form wire:submit.prevent="updateID">
                    <div  class="row">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingEmployee_type">
                                    <!-- <option selected value= NULL>Select employee type</option> -->
                                    <option value="Casual">Casual</option>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Daily basis">Daily basis</option>
                                    <option value="Permanent">Permanent</option>
                                </select>
                            <label for="floatingSelect">Employee type</label>
                            </div> 
                                @error('editingEmployee_type')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="editingNumber_type">
                                    <option selected>Select ID type</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="G">G</option>
                                    <option value="P">P</option>
                                </select>
                            <label for="floatingSelect">ID type</label>
                            </div> 
                                @error('editingNumber_type')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" wire:model.live="editingEmployee_no" class="form-control" id="employee_no" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                <label for="floatingSelect">ID Number</label>
                            </div>   
                                @error('editingEmployee_no')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                        </div>
                    </div>  
                </form>           
                @else
                <div class="row">
                    <div class="col">
                        <h5>
                        <div>Employee type: {{$data['profile']->employee_type}}</div> 
                        <div>Biman ID: {{$data['profile']->number_type}}-{{$data['profile']->employee_no}}
                        </h5>
                    </div>
                    <div class="col">
                        <button wire:click="editIDs({{$data['profile']->id}})" class="btn btn-outline-warning btn-sm float-right"><i class="bi bi-pencil"></i>Edit</button>
                    </div>
                </div>
                @endif
                @else
                <form wire:submit.prevent="storeID">
                    <div  class="row">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="employee_type">
                                    <option selected>Select employee type</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Daily basis">Daily basis</option>
                                    <option value="Permanent">Permanent</option>
                                </select>
                            <label for="floatingSelect">Employee type</label>
                            </div> 
                                @error('employee_type')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="number_type">
                                    <option selected>Select ID type</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="G">G</option>
                                    <option value="P">P</option>
                                </select>
                            <label for="floatingSelect">ID type</label>
                            </div> 
                                @error('number_type')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" wire:model.live="employee_no" class="form-control" id="employee_no" aria-describedby="middle_nameHelp" placeholder="Enter your middle name">
                                <label for="floatingSelect">ID Number</label>
                            </div>   
                                @error('employee_no')
                                <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                @enderror       
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                        </div>
                    </div>  
                </form>  
                @endif                         
            </div>
        </div>           
        </div>
    </div> 
</div>