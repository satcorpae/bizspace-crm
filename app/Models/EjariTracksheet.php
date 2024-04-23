<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjariTracksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'dater',
        'customer_agent',
        'description',
        'selling_price',
        'cost',
        'sales_ref',
        'mode',
        'status'
    ];
}
