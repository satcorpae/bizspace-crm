<?php

namespace App\Livewire;

use App\Models\paymentvoucher as ModelsPaymentvoucher;
use Livewire\Component;

class Paymentvoucher extends Component
{
    public $search = '';
    public function render()
    {
        $allData = ModelsPaymentvoucher::where('customer_agent', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.paymentvoucher', [
            "payVouch" => $allData 
        ]);
    }
}
