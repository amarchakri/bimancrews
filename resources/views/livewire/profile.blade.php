<div>
    <h1>Profile</h1> 
    <div class="row">
        <!-- Left Pane start -->
        <div class="col-2">
            <div class="card shadow">
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('name')) ? 'active' : '' }}" type="button" wire:click.prevent="name">Name</button>
                <!-- class="nav-link {{ (request()->is('login')) ? 'active' : '' }}"  -->
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('contacts')) ? 'active' : '' }}"  type="button" wire:click.prevent="contacts">Contacts</button>
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('signPhoto')) ? 'active' : '' }}"  type="button" wire:click.prevent="signPhoto">Sign / Photo</button>
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('education')) ? 'active' : '' }}"  type="button" wire:click.prevent="education">Proficiency</button>
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('training')) ? 'active' : '' }}"  type="button" wire:click.prevent="training">Training</button>
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('passport')) ? 'active' : '' }}"  type="button" wire:click.prevent="passport">Passport</button>
                <button class="btn btn-outline-primary mb-2 btn-sm {{ (request()->is('nid')) ? 'active' : '' }}"  type="button" wire:click.prevent="nid">NID</button>
                <button class="btn btn-outline-primary btn-sm"  type="button" wire:click.prevent="/">Not linked</button>
            </div>
        </div>
        <!-- Left Pane end -->
        <!-- Right Pane start -->
        <div class="col">
          @if (session()->has('success'))
              <div class="row justify-content-center text-center mt-3">
                  <div class="col-md-8">
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  </div>
              </div>
          @endif  
          <!-- names start here-->
          @if($names)  
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-name-tab" data-bs-toggle="pill" data-bs-target="#pills-name" type="button" role="tab" aria-controls="pills-name" aria-selected="true">Name</button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-bimanID-tab" data-bs-toggle="pill" data-bs-target="#pills-bimanID" type="button" role="tab" aria-controls="pills-bimanID" aria-selected="true">Biman ID</button>
              </li> -->
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-designation-tab" data-bs-toggle="pill" data-bs-target="#pills-designation" type="button" role="tab" aria-controls="pills-designation" aria-selected="true">Designation</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-responsibility-tab" data-bs-toggle="pill" data-bs-target="#pills-responsibility" type="button" role="tab" aria-controls="pills-responsibility" aria-selected="true">Responsibility</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-shop-tab" data-bs-toggle="pill" data-bs-target="#pills-shop" type="button" role="tab" aria-controls="pills-shop" aria-selected="true">Shop</button>
              </li>
              
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-name" role="tabpanel" aria-labelledby="pills-name-tab" tabindex="0">
                <livewire:name-component/>
              </div>
              <div class="tab-pane fade show" id="pills-bimanID" role="tabpanel" aria-labelledby="pills-bimanID-tab" tabindex="0">
                <livewire:i-d-component/>
              </div>
              <div class="tab-pane fade show" id="pills-designation" role="tabpanel" aria-labelledby="pills-designation-tab" tabindex="0">
                <livewire:base-designation/> 
              </div>
              <div class="tab-pane fade show" id="pills-responsibility" role="tabpanel" aria-labelledby="pills-responsibility-tab" tabindex="0">
                <livewire:designation-component/>
              </div>
              <div class="tab-pane fade show" id="pills-shop" role="tabpanel" aria-labelledby="pills-shop-tab" tabindex="0">
                <h1>Shop</h1>
              </div>
            </div>
          @endif
          <!-- names ends here-->
          <!-- contacts  starts here-->
          @if($contact)
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-presentAddress-tab" data-bs-toggle="pill" data-bs-target="#pills-presentAddress" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Present Address</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-permanentAddress-tab" data-bs-toggle="pill" data-bs-target="#pills-permanentAddress" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Permanent Address</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-phone-tab" data-bs-toggle="pill" data-bs-target="#pills-phone" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Phone</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-emails-tab" data-bs-toggle="pill" data-bs-target="#pills-emails" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Emails</button>
              </li>
              
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-presentAddress" role="tabpanel" aria-labelledby="pills-presentAddress-tab" tabindex="0">
                <livewire:present-address-component/>
              </div>
              <div class="tab-pane fade show " id="pills-permanentAddress" role="tabpanel" aria-labelledby="pills-permanentAddress-tab" tabindex="0">
                <livewire:permanent-address-component/>
              </div>
              <div class="tab-pane fade" id="pills-phone" role="tabpanel" aria-labelledby="pills-phone-tab" tabindex="0">
                <!-- bimanID starts here-->         
                <livewire:phone-component/>  
                <!-- bimanID ends here-->             
              </div>
              <div class="tab-pane fade" id="pills-emails" role="tabpanel" aria-labelledby="pills-emails-tab" tabindex="0">
                <livewire:email-component/> 
              </div> 
            </div>
          @endif
          <!-- image starts here-->
          @if($signImage)
            <div class="row">
              <div class="col">
                <livewire:signature-component/>
              </div>
              <div class="col">
                <livewire:image-component/>
              </div>
            </div>
          @endif
          @if($images)   
            <div class="row mb-2">              
              <div class="col">   
                  <!-- <livewire:signature-component/>                -->
                    LL
              </div>
              <div class="col">
                  HH
              </div>
            </div>  
          @endif
          <!-- image ends here-->
          @if($qualifications)
            <div class="row">
              <!-- <div class="col">
              </div>
              <div class="col"> -->
                <livewire:proficiency-component/>
              <!-- </div> -->
            </div>
          @endif
        </div>
        <!-- Right Pane end -->
    </div>

</div>
