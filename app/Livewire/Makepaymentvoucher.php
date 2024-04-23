<?php

namespace App\Livewire;

use App\Models\paymentvoucher;
use Carbon\Carbon;
use Livewire\Component;
use Mary\Traits\Toast;
use Mary\View\Components\Button;

class Makepaymentvoucher extends Component
{

    use Toast;
    public $dater;
    public $customer_agent;
    public $payment_number;
    public $terms;
    public $location;
    public $address;

    public $description;
    public $trn;
    
    
    
  public $descriptions = [];
    public $selling_prices = []; // Changed variable name to plural form
    public $quantities = []; // 
    
    public function addDescription()
    {
        $this->descriptions[] = '';
            $this->selling_prices[] = ''; // Corrected variable name
            $this->quantities[] = ''; // Corrected variable name
    }
    public function removeDescription($index)
    {
        unset($this->descriptions[$index]);
        unset($this->selling_prices[$index]); // Remove corresponding selling price
        unset($this->quantities[$index]); // Remove corresponding quantity
        $this->descriptions = array_values($this->descriptions); // reindex array
        $this->selling_prices = array_values($this->selling_prices); // reindex array
        $this->quantities = array_values($this->quantities); // reindex array
    }


    public function mount(){

        $this->dater = Carbon::now()->format('Y-m-d');
        // getting the latest payment voucher number
        $latestPVN = PaymentVoucher::latest('payment_number')->first();
        $payment_number = optional($latestPVN)->payment_number ?: 0;
        $this->payment_number = "PV-BSB-24" . ($payment_number + 1);

        // $this->customer_agent;
        $this->terms = "CASH";
        $this->address = "AL GARHOUD";
        $this->location = "Dubai , UAE";
        // dd($this->payment_number);
        $length = count($this->descriptions);
        
    }



    public function render()
    {
        return view('livewire.makepaymentvoucher');
    }
    public function save(){

    //     foreach ($this->descriptions as $item) {
    //        $this->selling_prices[] = $item->selling_price;
    //        $this->descriptions[] = $item->description;
    //        $this->quantities[] += $item->quantity;
    //    }
          $serializedDescriptions = serialize($this->descriptions);
        $serializedQuantities = serialize($this->quantities);
        $serializedSellingPrices = serialize($this->selling_prices);

        paymentvoucher::create([
            'customer_agent' => $this->customer_agent,
            'payment_number' => $this->payment_number,
            'address' => $this->address,
            'location' => $this->location,
            'date_t' => $this->dater,
            'terms' => $this->terms,
            'description' => $serializedDescriptions,
            'quantity' => $serializedQuantities,
            'rate' => $serializedSellingPrices,
            'trn' => $this->trn,
        ]);

         $this->success( 
            title:"Invoice Created Successfully",
            redirectTo: 'payment-voucher'
        );
    }
}
