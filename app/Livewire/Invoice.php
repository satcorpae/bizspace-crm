<?php

namespace App\Livewire;

use App\Models\Invoicestore;
use App\Models\mainreceipt;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\receipts;
use Mary\Traits\Toast;
class Invoice extends Component
{
    use WithPagination;
    use Toast;
    #[Title('Invoices')]
    public bool $mainModal = false;

    public $getInvoices;
    public $search = '';
    public $Invoices;
    public $selectedInvoices;
    public $selectedAmount;
    public $receipt_number;
    public $terms;
    public $address;
    public $location;
    public $customer_agent;
    public $trn;
    public $selectedInvoiceArr = [];
    public $selectedAmountArr = [];

    public function mount(){
        // $this->showInvoices();
        // dd( $this->showInvoicesData);
    }
    public function todaysDate(){
        $todaysDate = Invoicestore::whereDate('dater', Carbon::now())->paginate(10);
        return $todaysDate;
    }
    public function render()
    {
        $totalCustomers = Invoicestore::distinct('customer_agent')->count('customer_agent');
        $totalEntries = Invoicestore::count();
        $allInvoices = Invoicestore::where('customer_agent', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.invoice', [
            'allInvoices' => $allInvoices,
            'totalcustomers' => $totalCustomers,
            'totalentries' => $totalEntries
            
        ]);
    }
    public function checkboxClicked($id){
        $this->selectedInvoices = Invoicestore::query()
        ->where('id' , $id)
        ->pluck('invoice_number')
        ->first();

        $this->selectedAmount = Invoicestore::query()
            ->where('id', $id)
            ->pluck('amount')
            ->first();

        $this->customer_agent = Invoicestore::query()
            ->where('id', $id)
            ->pluck('customer_agent')
            ->first();
        
            $this->terms = Invoicestore::query()
            ->where('id', $id)
            ->pluck('terms')
            ->first();

            $this->location = Invoicestore::query()
            ->where('id', $id)
            ->pluck('location')
            ->first();

            $this->address = Invoicestore::query()
            ->where('id', $id)
            ->pluck('address')
            ->first();

             $this->trn = Invoicestore::query()
            ->where('id', $id)
            ->pluck('trn')
            ->first();

        if (in_array($id, $this->selectedInvoiceArr)) {
            // If the row is already selected, remove it from the array
            $this->selectedInvoiceArr = array_diff($this->selectedInvoiceArr, [$id]);
        } else {
            // Add the row to the selectedInvoiceArr array
            
            $this->selectedInvoiceArr[] = $this->selectedInvoices;
            $this->selectedAmountArr[] = $this->selectedAmount;
        }
        // dd($this->selectedInvoiceArr); 
        $secRows = $this->selectedInvoiceArr;
        // return $secRows;
        // dd($this->selectedInvoices , $this->selectedAmount);
    }
    public function storereceipts(){
        $serializedInvoices = serialize($this->selectedInvoiceArr);
        $serializedAmount = serialize($this->selectedAmountArr);
            mainreceipt::create([
                'receipt_number' => $this->receipt_number,
                'invoice_number' => $serializedInvoices,
                'amount' => $serializedAmount,
                'address' => $this->address,
                'location' => $this->location,
                'terms' => $this->terms,
                'customer_agent' => $this->customer_agent,
                'trn' => $this->trn
            ]);

            $this->toast(
                        type: 'success',
                        title: 'It is done!',
                        redirectTo: 'invoice'  
                    );
    }
}
