<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainreceipt extends Model
{
    use HasFactory;
     protected $fillable = [
        'receipt_number',
        'invoice_number',
        'amount',
        'address',
        'location',
        'customer_agent',
        'terms',
        'trn'
    ];
}
