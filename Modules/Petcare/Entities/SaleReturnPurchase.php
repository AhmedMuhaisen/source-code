<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleReturnPurchase extends Model
{
    use HasFactory;

    protected $fillable =[
        "reference_no", "purchase_id", "user_id", "supplier_id", "warehouse_id", "account_id", "item", "total_qty", "total_discount", "total_tax", "total_cost","order_tax_rate", "order_tax", "grand_total", "document", "return_note", "staff_note"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleReturnPurchaseFactory::new();
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SaleWarehouse');
    }
    public function purchaseReference()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SalePurchase' , 'purchase_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    public function supplier()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleSupplier');
    }
    public function purchaseReturnSingleProduct()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SalePurchaseProductReturn', 'id', 'return_id');
    }
}
