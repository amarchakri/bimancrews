<div>

    <form wire:submit.prevent="storeCourseType">
        <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="course_type_id">    
                                <option selected>Select course type</option>
                                @foreach($data['courseTypes'] as $courseType)
                                <option value="{{$courseType->id}}">{{$courseType->courseType}}</option>
                                @endforeach
                                <option value="NotListed">Not listed ?</option>
                            </select>
                            <label for="floatingSelect">Course type</label>
                            @error('course_type_id')
                            <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                            @enderror 
                        </div>     
                    </div>
            <div class="col">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="course_name_short">
                <label for="floatingInput">Course short name</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="course_name_long">
                <label for="floatingInput">Course long name</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="description">
                <label for="floatingInput">Description</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="duration_number">
                <label for="floatingInput">Duration in number</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" wire:model.live="duration_in">
                        <option selected>Open this select menu</option>
                        <option value="d">Day</option>
                        <option value="w">Week</option>
                        <option value="m">Month</option>
                        <option value="y">Year</option>
                    </select>
                    <label for="floatingSelect">Duration in day / month / year</label>
                </div>
            </div>          
            <div class="col">
                <div class="form-floating">
                    <button type="submit" class="btn btn-primary">Add Course Name</button>
                </div>                
            </div>
        </div>
    </form>

    <!-- open modal course Type-->
    @if($course_type_id === "NotListed")
        <div class="modal show shadow" tabindex="-1" role="dialog" style="display: block;" >
            <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content ">  
                    <div class="modal-header">
                        <h5 class="modal-title"> Course Type</h5>
                        <i  wire:click="resetForm" class="bi bi-x-lg btn btn-outline-danger"></i>
                        <!-- <svg wire:click="resetForm" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg> -->
                    </div>
                    <div class="modal-body">
                        <livewire:course-type/>
                    </div>
                </div>
            </div>
        </div>
    @endif 
</div>
