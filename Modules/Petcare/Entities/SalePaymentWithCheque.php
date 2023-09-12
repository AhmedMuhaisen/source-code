<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalePaymentWithCheque extends Model
{
    use HasFactory;

    protected $fillable =[

        "payment_id", "cheque_no"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SalePaymentWithChequeFactory::new();
    }
}
