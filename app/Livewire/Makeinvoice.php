<?php

namespace App\Livewire;
use App\Models\EjariTracksheet;
use App\Models\Invoicestore;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Mary\Traits\Toast;
class Makeinvoice extends Component
{
    use Toast;
    public $searchName = "";
    public $getEjari;


    // saving invoices
    public $currentDate;
    public $dueDate ;
    public $dater;
    public $invoice_number;
    public $terms;
    public $due_date ;
    public $customer_agent;
    public $address;
    public $location;
    public $trn_number;
    public $quantity;
    public $selling_price = [];
    public $description = [];
    public $getLatestINVNUM;
    public $trn;
    public $amount;

    public function mount(){
        $this->getLatestINVNUM = Invoicestore::count();
        $this->getLatestINVNUM += 1;
        $addINVNUM = strval($this->getLatestINVNUM);
        if($this->getLatestINVNUM <= 9){
            $addINVNUM = '0'. $addINVNUM;
        }
        // dd($this->getLatestINVNUM);
        // dd($addINVNUM);
        $this->currentDate = Carbon::now();
        $this->currentDate =  $this->currentDate->format('d/m/Y');
        $this->dueDate = Carbon::now();
        $this->dueDate = $this->dueDate->addDays(7);
        $this->dueDate =  $this->dueDate->format('d/m/Y');
        $this->customer_agent = $this->searchName;
        $this->terms = "CASH";
        $this->invoice_number = "INV-BS-24".$addINVNUM;
        $this->address = "AL GHAROUD";
        $this->location = "DUBAI UAE";
        $this->quantity = 1;
        $this->searchForName();

        // dd($this->dueDate);
    }
    public function render()
    {
        return view('livewire.makeinvoice');
    }
    public function searchForName(){
        $getEjari = EjariTracksheet::query()
        ->select(['description' , 'selling_price'])
        ->where('customer_agent' , $this->searchName)
        ->whereDate('dater' , Carbon::now())
        ->get();
        $this->getEjari = $getEjari;
        $this->amount = 0;
        foreach ($getEjari as $item) {
            $this->selling_price[] = $item->selling_price;
            $this->description[] = $item->description;
            $this->amount += $item->selling_price;
        }
     
    }
    public function storeInvoice(){
        $this->description = serialize($this->description);
        $this->quantity = serialize($this->quantity);
        $this->selling_price = serialize($this->selling_price);
        Invoicestore::create([
            'dater' => $this->currentDate,
            'invoice_number' => $this->invoice_number,
            'terms' => $this->terms,
            'due_date' => $this->dueDate,
            'customer_agent' => $this->searchName,
            'address' => $this->address,
            'location' => $this->location,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'selling_price' => $this->selling_price,
            'trn' => $this->trn,
            'amount' => $this->amount,
            'status' => "unpaid"
        ]);
        $this->success( 
            title:"Invoice Created Successfully",
            redirectTo: 'invoice'
        );
        
    }
}
