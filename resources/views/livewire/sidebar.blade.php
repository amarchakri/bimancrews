<div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas Sidebar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
        <!-- Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc. -->
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Course
            </button>
            <ul class="dropdown-menu">
                
                <li>
                    <a class="dropdown-item {{ (request()->is('dashboard')) ? 'active' : '' }}" href="/courseManagement" wire:navigate>courseManagement</a>
                </li>
                <!-- <li>
                    <a class="dropdown-item {{ (request()->is('courseManagement')) ? 'active' : '' }}" href="/courseManagement" wire:navigate>Course management</a>
                </li> -->
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
            </ul>
        </div>
    </div>
    </div>
</div>
