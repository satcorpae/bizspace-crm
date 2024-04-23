<?php

namespace App\Livewire;

use App\Models\EjariTracksheet;
use Livewire\Component;
use Mary\Traits\Toast;
class Ejarieditor extends Component
{
     use Toast;
    public $id;
    public $findEntry;
    public $dater;
    public $customer_agent;
    public $description;
    public $selling_price;
    public $cost;
    public $sales_ref;
    public $status;
    public $mode;
    public function mount($id){
        $this->findEntry = EjariTracksheet::query()
        ->where('id' , $id)
        ->get();
        foreach($this->findEntry as $item){
            $this->dater = $item->dater;
            $this->customer_agent = $item->customer_agent;
            $this->description = $item->description;
            $this->selling_price = $item->selling_price;
            $this->cost = $item->cost;
            $this->sales_ref = $item->sales_ref;
            $this->status = $item->status;
            $this->mode = $item->mode;
        }
       
    }
    public function render()
    {
        return view('livewire.ejarieditor');
    }
    public function save(){
        // dd($this->id ,  $this->findEntry);
        $updater = EjariTracksheet::find($this->id);
        $updater->dater = $this->dater;
        $updater->customer_agent = $this->customer_agent;
        $updater->description = $this->description;
        $updater->selling_price = $this->selling_price;
        $updater->cost = $this->cost;
        $updater->sales_ref = $this->sales_ref;
        $updater->status = $this->status;
        $updater->mode = $this->mode;
        $updater->save();
        $this->success( 
            title:"Ejari Entry Updated Successfully",
            redirectTo: '/tracksheet-editor'
        );

    }
    
}
