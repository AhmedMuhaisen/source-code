<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleSupplier extends Model
{
    use HasFactory;

    protected $fillable =[

        "name", "image", "company_name", "vat_number",
        "email", "phone_number", "address", "city",
        "state", "postal_code", "country", "is_active"
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleSupplierFactory::new();
    }

    public function product()
    {
    	return $this->hasMany('Modules\Petcare\Entities\SaleProduct', 'supplier_id');
    	
    }
}
