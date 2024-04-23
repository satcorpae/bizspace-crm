<?php

namespace App\Livewire;

use App\Models\EjariTracksheet as ModelsEjariTracksheet;
use App\Models\User;
use App\Models\virtualejari;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Livewire\Component;
use Livewire\Attributes\Title;
use function Livewire\Volt\title;
use Livewire\WithPagination;
use Mary\Traits\Toast;


// title('ejari');
class EjariTracksheet extends Component
{
    use WithPagination;
    use Toast;

    public bool $showDrawer2 = false;
    #[Title('Ejari Tracksheet')]



    public $search;

    public $dater;
    public $ca;
    public $description;
    public $sp;
    public $coe;
    public $sr;
    public $mode;
    public $status;
    public array $sortBy = ['column' => 'customer_agent' ,  'direction' => 'asc'];
    public function render()
    {
        $users = ModelsEjariTracksheet::where('customer_agent', 'like', '%' . $this->search . '%')->paginate(8);


        return view('livewire.ejari-tracksheet', [
            'results' => $users,
        ]);
    }
    public function save(){
        ModelsEjariTracksheet::create([
            'dater' => $this->dater,
            'customer_agent' => $this->ca,
            'description' => $this->description,
            'selling_price' => $this->sp,
            'cost' => $this->coe,
            'sales_ref' => $this->sr,
            'mode' => $this->mode,
            'status' => "Unchecked"
        ]);
        virtualejari::create([
            'agent' => $this->ca,
            'ref' => $this->sr,
            'start_date' => $this->dater,
            'company_name' => $this->description
        ]);
        $this->toast(
            type: 'success',
            title: 'It is done!',
            redirectTo: 'ejari-tracksheet'  
        );
    }



}
