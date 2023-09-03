<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleTax extends Model
{
    use HasFactory;

    protected $fillable =[
        "name", "rate", "is_active"
    ];

    
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleTaxFactory::new();
    }

    public function product()
    {
    	return $this->hasMany('Modules\Petcare\Entities\SaleProduct');
    	
    }
}
