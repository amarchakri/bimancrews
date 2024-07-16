<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body"> 
                <form wire:submit="register">
                    <div class="mb-3 row">
                        <label for="number_type" class="col-md-4 col-form-label text-md-end text-start">ID Type</label>
                        <div class="col-md-6">
                            <select class="form-select" wire:model="number_type">
                                <option selected>Select type</option>
                                <option value="P">P</option>
                                <option value="G">G</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            @if ($errors->has('number_type'))
                                <span class="text-danger">{{ $errors->first('number_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="employee_no" class="col-md-4 col-form-label text-md-end text-start">Employee No</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('employee_no') is-invalid @enderror" id="employee_no" wire:model="employee_no">
                            @if ($errors->has('employee_no'))
                                <span class="text-danger">{{ $errors->first('employee_no') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">
                            Register
                       </button>
                    </div>
                </form>
                <div class="mb-3 row"> 
                    <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span>
                </div>
            </div>
        </div>
    </div>    
</div>