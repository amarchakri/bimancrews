<?php

namespace App\Livewire;

use App\Models\Proficiency;
use Livewire\Component;

class Diploma extends Component
{
    public $editIt ;
    public function render()
    {
        $data['diplomas'] = Proficiency::with(['employee','course'])
                                    // ->where('proficiency_type_id',2)
                                    ->get();
        return view('livewire.diploma',['data'=>$data]);
    }
}
