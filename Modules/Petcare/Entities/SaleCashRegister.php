<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleCashRegister extends Model
{
    use HasFactory;

    protected $fillable = ["cash_in_hand", "user_id", "warehouse_id", "status"];

    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleCashRegisterFactory::new();
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function warehouse()
    {
    	return $this->belongsTo('Modules\Petcare\Entities\SaleWarehouse');
    }
}
