<?php

namespace App\Livewire;

use App\Models\Proficiency;
use Livewire\Component;

class BasicEducation extends Component
{
    public $editIt ;
    public function render()
    {
        $data['basicEducations'] = Proficiency::with(['employee','course'])
                                    // ->where('proficiency_type_id',1)
                                    ->get();
        return view('livewire.basic-education',['data'=>$data]);
    }
}
