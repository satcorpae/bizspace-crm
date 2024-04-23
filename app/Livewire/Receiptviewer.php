<?php

namespace App\Livewire;

use App\Models\mainreceipt;
use Livewire\Component;
use Dompdf\Dompdf;
class Receiptviewer extends Component
{
    public $receipt_number;
    public function mount(){
        $this->generatePDF($this->receipt_number);
    }
    public function render()
    {    
        // dd($this->receipt_number);
        return view('livewire.receiptviewer');
    }
        public function generatePDF($receipt_number){

        $this->receipt_number = $receipt_number;
        $invData= mainreceipt::query()
        ->select(['invoice_number'  ,'receipt_number' , 'amount' , 'customer_agent' , 'location', 'terms' , 'trn'])
        ->where('receipt_number' , $receipt_number)
        ->get();


        // number to word

         $path = public_path(). '/biz.jpg';
        $type = pathinfo($path , PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/'. $type . ';base64,' . base64_encode($data);

         $dompdf = new Dompdf();
     
         $html = view('volt-livewire::receiptviewer' , compact('invData', 'image' ))->render();
        //  $pdfC = file_get_contents(public_path('inv-temp.html'));
         $dompdf->loadHtml($html);

            // (Optional) Set paper size and orientation
            $dompdf->setPaper('A3', 'portrait');

            // Render PDF
            $dompdf->render();
            header("Content-type:application/pdf");
            header("Content-Disposition: attachment; filename='download.pdf'");
            // Output PDF to browser
            return $dompdf->stream('invoice.pdf', ['Attachment' => 0]);

    }
}
