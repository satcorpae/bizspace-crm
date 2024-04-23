<?php

namespace App\Livewire;

use App\Models\EjariTracksheet;
use Livewire\Component;

class Editejaritracksheet extends Component
{   
    public $search = '';
    public function render()
    {
        $users = EjariTracksheet::where('customer_agent', 'like', '%' . $this->search . '%')->paginate(8);

        return view('livewire.editejaritracksheet', [
            'results' => $users,
        ]);
    }
}
