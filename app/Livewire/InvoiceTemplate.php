<?php

namespace App\Livewire;

use App\Models\Invoicestore;
use Livewire\Component;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PDF;
use Rmunate\Utilities\SpellNumber;
use NumberToWords\NumberToWords;
class InvoiceTemplate extends Component
{
    public $id;
    public $getINVNUM;
    public $total;
    public function mount($id){
   
        // dd($id
        $this->generatePDF($id);

    }
    public function render()
    {
        return view('livewire.invoice-template');
    }
    public function generatePDF($id){

        $this->id = $id;
        $invData= Invoicestore::query()
        ->select(['customer_agent','invoice_number','description' , 'dater' , 'trn' , 'terms' ,'address' , 'location','selling_price' , 'amount'])
        ->where('invoice_number' , $id)
        ->get();


        // number to word

         $path = public_path(). '/biz.jpg';
        $type = pathinfo($path , PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/'. $type . ';base64,' . base64_encode($data);

         $dompdf = new Dompdf();
     
         $html = view('maininvoicetemplate' , compact('invData', 'image' ))->render();
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
