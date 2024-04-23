<?php

namespace App\Livewire;

use App\Models\virtualejari;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use Livewire\Component;

class Virutalejari extends Component
{

    use WithPagination;
    use Toast;

    public bool $showDrawer2 = false;
    #[Title('Virtual Ejari')]

    public $search;
    public function render()
    {

        $users = virtualejari::where('agent', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.virutalejari', [
            'results' => $users,
        ]);
    }
}
