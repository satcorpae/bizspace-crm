<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
        <img src="{{$image}}" alt="" style="position: absolute;left:3px;top:20px;height:150px;width:340px;">
    @foreach ($invData as $item)
    <div style="width: 1040px; height: 1350px; border: 1px solid black;">
        <div class="tax-invoice-section"            style=
                "font-size:50px;
                color:rgb(192,0,0);
                font-weight:bold;
                position: absolute;
                right:0px;
                top:-30px;
                ">
            <p 
   
            >
            TAX INVOICE
            </p>
            <p style="font-size:14px;color:black;margin-top:-45px;margin-left:160px;font-weight:bold;">TRN NO. 104047415500003 </p>
            <div class="tax-invoice-number "
                style="font-size:14px;color:white; background-color:rgb(192,0,0);padding:5px;display:flex;"
            >
                <span style="margin-left:10px;font-weight:bold;">TAX INVOICE #</span>
                <span style="margin-left:150px;font-weight:bold;">DATE</span>
            </div>
            <div class="input-tax-invoice-num" style="font-size: 14px; color:black;margin-top:10px;">
                <span style="margin-left:10px;font-weight:bold; ">
                           {{$item->receipt_number}}
                        </span>
                        <span style="margin-left:150px;font-weight:bold;">
                            @php
                                $invdate = $item->dater;
                                $formattedDate = date("d-M-Y", strtotime(str_replace("/", "-", $invdate)));
                             
                            @endphp
                            {{$formattedDate}}
                        </span>
                    </div>
                    <div class="customer-id-number"
                    style="font-size:14px;color:white;margin-top:10px; background-color:rgb(192,0,0);padding:5px;display:flex;"
                    >
                    <span style="margin-left:10px;font-weight:bold;">CUSTOMER ID</span>
                    <span style="margin-left:150px;font-weight:bold;">TERMS</span>
                </div>
                <div class="input-tax-invoice-num" style="font-size: 14px; color:black;margin-top:10px;">
                    <span style="margin-left:10px;font-weight:bold; ">
                        BS 0154
                    </span>
                    <span style="margin-left:150px;font-weight:bold;">
                        
                       {{$item->terms}}
                    </span>
                </div>
            </div>
            
            <div class="bill-to-section" style="position: absolute;top:162px;">
                <div class="bill-to">
                    <p style="color:white; background-color:rgb(192,0,0);width:360px;padding:4px;">BILL TO</p>
                    <div class="bill-to-content">
                        <span style="font-weight:bold;margin-left:3px;">{{$item->customer_agent}}</span><br>
                        <span style="font-weight:bold;margin-left:3px;">TRN NO. {{$item->trn}}</span>
                    </div>
                </div>
            </div>
            <div class="address-section" style="position: absolute;top:266px;">
                <div class="bill-to">
                    <p style="color:white; background-color:rgb(192,0,0);width:360px;padding:4px;font-weight:bold;">ADDRESS</p>
                    <div class="bill-to-content">
                        <span style="font-weight:bold;margin-left:3px;">{{$item->location}}</span><br>
                    </div>
                </div>
            </div>
            
            {{-- table --}}
            <div class="table-content" style="position: absolute;top:380px;width:1040px; ">
                <table style="width:1040px;border:1px solid black;height:600px;border-collapse: collapse;border-bottom:none; ">
                    <thead style="color:white;background-color:rgb(192,0,0);font-weight:bold;border:1px solid black;">
                        <th>SL</th>
                        <th>DECSCRIPTION</th>
                        <th>QTY</th>
                        <th>UNIT PRICE</th>
                        <th>TOTAL AMOUNT</th>
                    </thead>
                    <tbody >
                         @php
                              $unserializedAmount = unserialize($item->amount); 
                              $unserializedInvoice = unserialize($item->invoice_number);
                              $length = count($unserializedInvoice); 
                              $total = 0;
                        @endphp
                            @for ($i = 0; $i < $length; $i++)
                            @php
                                $data = $unserializedAmount[$i];
                                $dis = $unserializedInvoice[$i];
                                $total += $unserializedAmount[$i];
                            @endphp
                        <tr >
                            
                            <td style="border: 1px solid black;margin-left:20px;">
                                    {{$i+1}}
                            </td>
                              
                            <td style="border: 1px solid black;margin-left:20px;">
                                {{$dis}}
                            </td>
                            <td style="border: 1px solid black;"><span style="margin-left:20px;">1</span></td>
                            <td style="border: 1px solid black;"><span style="margin-left:80px;">
                                    {{ $data }}
                             </span>
                            </td>
                            <td style="border: 1px solid black;"><span style="margin-left:80px;">
                                {{$data}}
                             
                            </span>
                        </td>
                    </tr>
                    @endfor  


            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;margin-left:20px;"></td>
                        <td style="border: 1px solid black;margin-left:20px;"></td>
                        <td style="border: 1px solid black;margin-left:20px;"></td>
                        <td style="border: 1px solid black;margin-left:20px;"></td>
                        <td style="border: 1px solid black;margin-left:20px;"><span style="margin-left:100px;">-</span></td>
                    </tr>
                    <tr style="background-color: rgb(245, 139, 139); border:none;">
                        <td >
                            
                        </td>
                        <td>
                            <span style="color:rgb(192,0,0);font-weight:bold;margin-left:50px;">Thank you for your business!</span>
                        </td>
                        <td></td>
                        <td rowspan="1" style="margin-left:50px;">
                            
                            <span style="color:rgb(192,0,0); font-weight:bold;">
                                TOTAL
                            </span>
                        </td>
                        <td rowspan="5" style="background-color:white;">
                            <div class="amount" >
                                <span style="margin-left:70px;" >{{$total}}</span>
                                <hr 
                                style="height:1px;border:none; margin:0;background-color:black;">
    
                                <hr 
                                style="height:1px;border:none; margin:0;background-color:black;">
                                <span style="margin-left:70px;" wire:model="total">
                                    {{-- {{$TOTAL}} --}}
                                </span>
                                <hr 
                                style="height:1px;border:none;margin-bottom:4px; margin:0;background-color:black;">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p
        style="position: absolute;bottom:650px;font-weight: bold;font-style:italic;margin-left:10px;" 
        >
        @php
    $numberToWords = new \NumberToWords\NumberToWords(); // Using fully qualified class name

    // build a new number transformer using the RFC 3066 language identifier
    $numberTransformer = $numberToWords->getNumberTransformer('en');
    $words = $numberTransformer->toWords($total);
    $words = ucwords($words);
@endphp 
     UAE DIRHAMS {{$words}} Only
      
    </p>
    
    <div class="bank-content" style="position: absolute;bottom:400px;margin-left:10px;">
        <b>FIND OUR BANK DETAILS AS FOLLOWS:</b>
        <div class="bank-details">
            <span style="margin-bottom: 5px;">
                ACCOUNT NAME : BIZ SPACE BUSINESS CENTER LLC
            </span><br>
            <span>
                ACCOUNT NO. :12544741920001
            </span><br>
            <span>
                IBAN NO. : AE760030012544741920001
            </span><br>
            <span>
                BANK NAME : ADCB
            </span><br>
        </div>
    </div>
    <div class="footer" style="position: absolute;bottom:150px; text-align:center;margin-left: 240px;">
        <span>
            If you have any questions about this invoice, please contact
        </span><br>
        <span style="font-weight: bold;">
            [BIZ SPACE BUSINESS CENTER LLC , 04 294 8466, info@bizspace.ae]
        </span>
    </div>
    
    @endforeach
</div>



</body>
</html>