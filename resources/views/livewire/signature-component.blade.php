<div>
  <!-- Signature start -->
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
    <div class="card-header"><h5>Signature</h5></div>
    <div class="card-body">        
      @if(isset($data['signature']->signature))
      <img src="{{ asset('uploads/signatureImage/'.$data['signature']->signature) }} " width="300" /> 
      @endif                 
      @if ($signature)
      <img src="{{$signature->temporaryUrl()}}" width="300">
      @endif 

      <div class="d-flex justify-content-arount">
        <div class="form-group mt-2">
          <input type="file" class="form-control" wire:model="signature" id="signature" placeholder="Enter signature">
          <span class="text-danger">@error('signature') {{ $message }} @enderror</span>
        </div>

        <div class="form-group mt-2">
          <button wire:click.prevent="storeSignature" class="btn btn-outline-primary btn-sm">Upload</button> 
        </div>
      </div> 

    </div>
  </div>  
  <!-- Signature end -->  
</div>
