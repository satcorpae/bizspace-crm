<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;
     protected $fillable = [
        'receipt_number',
        'invoice_number',
        'amount'
    ];
}
