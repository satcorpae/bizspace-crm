<?php

namespace App\Livewire;

use App\Models\paymentvoucher;
use Livewire\Component;
use PDF;
use Dompdf\Dompdf;
class PaymentVoucherTemplate extends Component
{
    public $payment_number;
     public function mount(){
        $this->generatePDF($this->payment_number);
    }

    public function render()
    {
        return view('livewire.payment-voucher-template');
    }
    public function generatePDF($payment_number){
        
        $this->payment_number = $payment_number;
        $invData= paymentvoucher::query()
        ->select(['customer_agent','description' , 'date_t' , 'trn' , 'terms' ,'address' , 'location','rate', 'payment_number' ])
        ->where('payment_number' , $payment_number)
        ->get();
        
        // $getUser = paymentvoucher::query()
        // ->where('payment_number' ,  $this->payment_number)
        // ->get();

    // number to word

        $path = public_path(). '/biz.jpg';
        $type = pathinfo($path , PATHINFO_EXTENSION);
         $data = file_get_contents($path);
        $image = 'data:image/'. $type . ';base64,' . base64_encode($data);

        $dompdf = new Dompdf();
    
        $html = view('volt-livewire::payment-voucher-template' , compact('invData', 'image' ))->render();
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
