<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleReturn extends Model
{
    use HasFactory;

    protected $fillable =[
        "reference_no", "user_id", "sale_id", "cash_register_id", "customer_id", "warehouse_id", "biller_id", "account_id", "item", "total_qty", "total_discount", "total_tax", "total_price","order_tax_rate", "order_tax", "grand_total", "document", "return_note", "staff_note"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleReturnFactory::new();
    }

    public function biller()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleBiller');
    }

    public function customer()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleCustomer');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SaleWarehouse');
    }
    public function saleReference()
    {
        return $this->belongsTo('Modules\Petcare\Entities\Sale' , 'sale_id');
    }

    public function saleReturnSingleProduct()
    {
        return $this->belongsTo('Modules\Petcare\Entities\SaleProductReturn', 'id', 'return_id');
    }
}
