<div>
    <!-- address starts here-->
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
            <!-- <h5 class="card-title">Permanent Address</h5>                                                       -->
                @if(isset($data['profile']->permanent_address))
                    @if($editPermanentAddressId === $data['profile']->id)
                    <form  wire:submit.prevent="updatePermanentAddress">
                    <div class="form-floating mb-3">
                        <textarea wire:model="editingPermanentAddress"  class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Write permanent address</label>
                        @error('editingPermanentAddress')
                        <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                        @enderror  
                    </div>                
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" wire:click="resetForm"  class="btn btn-warning">Cancel</button>
                    </form> 
                    @else
                    <span>{{ $data['profile']->permanent_address }}</span>
                    <button wire:click="editPermanentAddress({{$data['profile']->id}})" class="btn btn-outline-warning btn-sm float-right"><i class="bi bi-pencil"></i>Edit</button>
                    @endif
                @else
                    <form  wire:submit.prevent="storePermanentAddress">
                    <div class="form-floating mb-3">
                        <textarea wire:model="permanent_address"   class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Write present address</label>
                    </div>                
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>              
                @endif   
            </div>
        </div>   
    <!-- address ends here--> 
                
</div>
