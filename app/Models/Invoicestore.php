<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicestore extends Model
{
    use HasFactory;
        protected $fillable = [
        'dater',
        'invoice_number',
        'terms',
        'due_date',
        'customer_agent',
        'address',
        'location',
        'description',
        'quantity',
        'selling_price',
        'amount',
        'status',
        'trn'
    ];
}
