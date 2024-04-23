<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class virtualejari extends Model
{
    use HasFactory;
        protected $fillable =[
            'ejari_unit_no' ,
            'area' ,
            'start_date' ,
            'end_date',
            'contract_no' ,
            'company_name' ,
            'validity' ,
            'terms' ,
            'agent' ,
            'ref' ,
            'status'
    ];
}
