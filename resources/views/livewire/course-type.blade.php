<div>
    <form wire:submit.prevent="storeCourseType">
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="courseType">
                <label for="floatingInput">Course Type</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model.live="description">
                <label for="floatingInput">Description</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <button type="submit" class="btn btn-primary">Add Course Type</button>
                </div>                
            </div>
        </div>
    </form>
</div>
