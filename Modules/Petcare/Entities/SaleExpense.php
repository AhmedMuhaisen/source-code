<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleExpense extends Model
{
    use HasFactory;

    protected $fillable =[
        "reference_no", "expense_category_id", "warehouse_id", "account_id", "user_id", "cash_register_id", "amount", "note", "created_at"  
    ];

    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleExpenseFactory::new();
    }
    public function warehouse()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleWarehouse');
    }

    public function expenseCategory() {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleExpenseCategory');
    }
}
