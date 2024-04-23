<?php

namespace App\Livewire;

use App\Models\mainreceipt;
use Livewire\Component;

class Receipt extends Component
{   

    public $search = '';
    public function render()
    {
        $allreceipts = mainreceipt::where('receipt_number', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.receipt',[
            'allreceipts' => $allreceipts
        ]);
    }
}
