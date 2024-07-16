<div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-basicEducation-tab" data-bs-toggle="pill" data-bs-target="#pills-basicEducation" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Basic Education</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link " id="pills-diploma-tab" data-bs-toggle="pill" data-bs-target="#pills-diploma" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Diploma</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-course-tab" data-bs-toggle="pill" data-bs-target="#pills-course" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Course</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-training-tab" data-bs-toggle="pill" data-bs-target="#pills-training" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Training</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-licence-tab" data-bs-toggle="pill" data-bs-target="#pills-licence" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Licence</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link btn-outline-success" id="pills-addNew-tab" data-bs-toggle="pill" data-bs-target="#pills-addNew" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Add New</button>
        </li>
        
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-basicEducation" role="tabpanel" aria-labelledby="pills-basicEducation-tab" tabindex="0">
        <livewire:basic-education/>
        </div>
        <div class="tab-pane fade show " id="pills-diploma" role="tabpanel" aria-labelledby="pills-diploma-tab" tabindex="0">
        <livewire:diploma/>
        </div>
        <div class="tab-pane fade" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab" tabindex="0">
                <!-- phone starts here-->         
        <livewire:course/>  
                <!-- phone ends here-->             
        </div>
        <div class="tab-pane fade" id="pills-training" role="tabpanel" aria-labelledby="pills-training-tab" tabindex="0">
        <livewire:training/> 
        </div> 
        <div class="tab-pane fade" id="pills-licence" role="tabpanel" aria-labelledby="pills-licence-tab" tabindex="0">
        <livewire:licence/>
        </div> 
        <div class="tab-pane fade" id="pills-addNew" role="tabpanel" aria-labelledby="pills-addNew-tab" tabindex="0">
            
        <!-- add new starts  -->
        <livewire:proficiency-add-component/>               
        <!-- add new ends  -->

        </div> 
    </div>
</div>
