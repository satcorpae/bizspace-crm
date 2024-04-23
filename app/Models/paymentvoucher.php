<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentvoucher extends Model
{
    use HasFactory;
        protected $fillable= [
        'customer_agent',
        'address',
        'location',
        'payment_number',
        'date_t',
        'terms',
        'description',
        'quantity',
        'rate',
    ];
}
