<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleVariant extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleVariantFactory::new();
    }

    public function product()
    {
    	return $this->belongsToMany('Modules\Petcare\Entities\SaleProduct', 'sale_product_variant')->withPivot('id', 'item_code', 'additional_cost', 'additional_price');
    }
}
