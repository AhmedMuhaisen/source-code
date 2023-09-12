<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleCustomerGroup extends Model
{
    use HasFactory;

    protected $fillable =[

        "name", "percentage", "is_active"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleCustomerGroupFactory::new();
    }
}
