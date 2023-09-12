<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "is_additional","code", "type",  "price", "promotion", "promotion_price",  "tax_id", "tax_method", "image", "file", "featured","service_details",  "is_active", 'created_by'
    ];

    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleProductFactory::new();
    }

 
    public function tax()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SaleTax', 'tax_id', 'id');
    }

 
 

    public function scopeActiveStandard($query)
    {
        return $query->where([
            ['is_active', true],
            ['type', 'standard'],
        ]);
    }

    public function scopeActiveFeatured($query)
    {
        return $query->where([
            ['is_active', true],
            ['featured', 1],
        ]);
    }
}
