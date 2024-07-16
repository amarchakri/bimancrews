<?php

namespace App\Livewire;

use App\Models\Proficiency;
use Livewire\Component;

class Licence extends Component
{
    public $editIt ;
    public function render()
    {
        $data['licences'] = Proficiency::with(['employee','course'])
                                    // ->where('proficiency_type_id',5)
                                    ->get();
        return view('livewire.licence',['data'=>$data]);
    }
}
