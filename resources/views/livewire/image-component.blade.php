<div>
  <!-- profileImage start -->
  <div class="card shadow border-info">
        @if (session()->has('message'))
            <div class="row justify-content-center text-center mt-3">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif  
    <div class="card-header"><h5>Profile Image</h5></div>
    <div class="card-body">        
      @if(isset($data['profileImage']->profile_image))
      <img src="{{ asset('uploads/profileImage/'.$data['profileImage']->profile_image) }} " width="300" /> 
      @endif                 
      @if ($profileImage)
      <img src="{{$profileImage->temporaryUrl()}}" width="300">
      @endif 

      <div class="d-flex justify-content-arount">
        <div class="form-group mt-2">
          <input type="file" class="form-control" wire:model="profileImage" id="profileImage" placeholder="Enter profileImage">
          <span class="text-danger">@error('profileImage') {{ $message }} @enderror</span>
        </div>

        <div class="form-group mt-2">
          <button wire:click.prevent="storeprofileImage" class="btn btn-outline-primary btn-sm">Upload</button> 
        </div>
      </div> 

    </div>
  </div>  
  <!-- profileImage end -->  
</div>
