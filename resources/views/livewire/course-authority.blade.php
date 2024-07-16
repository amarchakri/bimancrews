<div>
    <form wire:submit.prevent="storeAuthority">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" wire:model.live="name">
                <label for="">Name</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" wire:model.live="address">
                <label for="">Address</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" wire:model.live="description">
                <label for="">Description</label>
            </div>
            <div class="col">
                <button type="submit" class="form-control">Add authority</button>
            </div>
        </div>
    </form>
</div>
