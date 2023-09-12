<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleStockCount extends Model
{
    use HasFactory;

    protected $fillable =[
        "reference_no", "warehouse_id", "brand_id", "category_id", "user_id", "type", "initial_file", "final_file", "note", "is_adjusted"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleStockCountFactory::new();
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SaleWarehouse');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleCategory');
    }

    public function brand()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleBrand');
    }
}
