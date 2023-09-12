<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleUnit extends Model
{
    use HasFactory;

    protected $fillable =[

        "unit_code", "unit_name", "base_unit", "operator", "operation_value", "is_active"
    ];

    
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleUnitFactory::new();
    }
    public function product()
    {
    	return $this->hasMany('Modules\Petcare\Entities\SaleProduct');
    	
    }
}
