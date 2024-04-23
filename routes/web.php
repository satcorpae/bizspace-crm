<?php

use App\Http\Controllers\invtempController;
use App\Livewire\Dashboard;
use App\Livewire\Editejaritracksheet;
use App\Livewire\Ejarieditor;
use App\Livewire\EjariTracksheet;
use App\Livewire\Invoice;
use App\Livewire\InvoiceTemplate;
use App\Livewire\Makeinvoice;
use App\Livewire\Makepaymentvoucher;
use App\Livewire\Paymentvoucher;
use App\Livewire\PaymentVoucherTemplate;
use App\Livewire\Receipt;
use App\Livewire\Receiptviewer;
use App\Livewire\Sidebar;
use App\Livewire\SRTracksheet;
use App\Livewire\Virutalejari;
use Livewire\Volt\Volt;

Volt::route('/', 'users.index');

Volt::route('sidebar' , Sidebar::class);
Volt::route('dashboard' , Dashboard::class);
Volt::route('ejari-tracksheet' , EjariTracksheet::class);
Volt::route('sr-tracksheet' , SRTracksheet::class);
Volt::route('virtual-ejari' , Virutalejari::class);
Volt::route('invoice' , Invoice::class);
Volt::route('make-invoice' , Makeinvoice::class);
Volt::route('view-invoice/{id}' , InvoiceTemplate::class);
Volt::route('receipts' , Receipt::class);
Volt::route('payment-voucher' , Paymentvoucher::class);
Volt::route('tracksheet-editor' , Editejaritracksheet::class);
Volt::route('ejari-editor/{id}' , Ejarieditor::class);
Volt::Route('view-receipt/{receipt_number}' , Receiptviewer::class);
Volt::Route('make-payment-voucher', Makepaymentvoucher::class);
Volt::Route('pv-view/{payment_number}' , PaymentVoucherTemplate::class);
