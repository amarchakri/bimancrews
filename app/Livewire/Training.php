<?php

namespace App\Livewire;

use App\Models\Proficiency;
use Livewire\Component;

class Training extends Component
{
    public $editIt ;
    public function render()
    {
        $data['trainings'] = Proficiency::with(['employee','course'])
                                    // ->where('proficiency_type_id',4)
                                    ->get();
        return view('livewire.training',['data'=>$data]);
    }
}
