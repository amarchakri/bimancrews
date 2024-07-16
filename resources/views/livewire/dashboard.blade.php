<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">This Dashboard</div>
                <div class="card-body">
                    <h6>
                        <p>Name: 
                            @if(isset($employee->first_name))
                                {{$employee->first_name}} {{$employee->last_name}}
                            @endif 
                        </p>
                        <p>Designation: <livewire:base-designation/> 
                        </p>
                    </h6>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">Profile Image</div>
                <div class="card-body">
                    @if(isset($employee->profile_image))
                    <img src="{{ asset('uploads/profileImage/'.$employee->profile_image) }} " width="300" /> 
                    @endif  
                </div>
            </div>
        </div>                  
    </div>
    <div class="col-md-12 mt-3">    
        <h6>Training status</h6>          
        <!-- All training for specific employee -->    
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-seep-tab" data-bs-toggle="pill" data-bs-target="#pills-seep" type="button" role="tab" aria-controls="pills-seep" aria-selected="true">SEEP</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-allCourseForAll-tab" data-bs-toggle="pill" data-bs-target="#pills-allCourseForAll" type="button" role="tab" aria-controls="pills-seep" aria-selected="true">All Course for all</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-allTraining-tab" data-bs-toggle="pill" data-bs-target="#pills-allTraining" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Training</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-training-seep-tab" data-bs-toggle="pill" data-bs-target="#pills-training-seep" type="button" role="tab" aria-controls="pills-training-seep" aria-selected="false">Training - SEEP</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-seep" role="tabpanel" aria-labelledby="pills-seep-tab" tabindex="0">
                <div class="card shadow border-info mt-2" >
                    <div class="card-body">
                        <table class="table table-bordered border-primary mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Institute</th>
                                    <th>Executor</th>
                                    <th>Aircraft</th>
                                    <th>Reference</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Valid upto</th>
                                    <th>Certificate image</th>
                                    <th>Transcript image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data['trainings-seep'])>0)
                                @foreach($data['trainings-seep'] as $index=>$proficiencie)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>
                                            @if($editIt === $proficiencie->id)
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"  wire:model.live="editingInstitute">
                                                    <label for="floatingSelect">Institute</label>
                                                    @error('editingInstitute')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>   
                                            @else                            
                                            {{$proficiencie->institute}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id)
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"  wire:model.live="editingExecutor">
                                                    <label for="floatingSelect">Executor / Responsible person</label>
                                                    @error('editingExecutor')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>  
                                            @else                            
                                            {{$proficiencie->executor}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id) 
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" wire:model.live="editingAircraft">
                                                    <label for="floatingSelect">Starts</label>
                                                    @error('editingAircraft')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>                                 
                                            @else
                                            {{$proficiencie->aircraft}}
                                            @endif                            
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id) 
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"  wire:model.live="editingReference">
                                                    <label for="floatingSelect">Reference</label>
                                                    @error('editingReference')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>                                
                                            @else
                                            {{$proficiencie->reference}}
                                            @endif                            
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id) 
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" wire:model.live="editingStartDate">
                                                    <label for="floatingSelect">Starts</label>
                                                    @error('editingStartDate')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>  
                                            
                                            @else
                                            {{$proficiencie->start_date}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id) 
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" wire:model.live="editingEndDate">
                                                    <label for="floatingSelect">Ends</label>
                                                    @error('editingEndDate')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>  
                                            
                                            @else
                                            {{$proficiencie->end_date}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($editIt === $proficiencie->id) 
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" wire:model.live="editingValidupto">
                                                    <label for="floatingSelect">Valid upto</label>
                                                    @error('editingValidupto')
                                                    <div class="text-danger" style="font-size:11.5px;">{{ $message }}</div>
                                                    @enderror 
                                                </div>  
                                            @else
                                            {{$proficiencie->validupto}}
                                            @endif
                                        </td>
                                        <td>
                                        <img src="{{ asset('uploads/certificateImage/'.$proficiencie->certificate_image) }} " width="90" alt="Certificate" />                          
                                        </td>
                                        <td>                             
                                        <img src="{{ asset('uploads/transcriptImage/'.$proficiencie->transcript_image) }} " width="90" alt="Transcript" />   
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <span>No proficiency found</span>
                                @endif
                            </tbody>
                        </table>                         
                    </div>                         
                </div>  
            </div>
            <div class="tab-pane fade show " id="pills-allCourseForAll" role="tabpanel" aria-labelledby="pills-allCourseForAll-tab" tabindex="0">
                <div class="card shadow border-info mt-2" >
                        <div class="card-body">
                            DGR    
                        </div>                         
                    </div>           
                </div>
            <div class="tab-pane fade" id="pills-allTraining" role="tabpanel" aria-labelledby="pills-allTraining-tab" tabindex="0">
                <div class="card shadow border-info mt-2" >
                    <div class="card-body">
                        MGR    
                    </div>                         
                </div>            
                    
            </div>
            <div class="tab-pane fade" id="pills-training-seep" role="tabpanel" aria-labelledby="pills-training-seep-tab" tabindex="0">
                <div class="card shadow border-info mt-2" >
                    <div class="card-body">
                        FCR    
                    </div>                         
                </div>         
            </div> 
        </div>         
    </div>  
      
</div>