<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDelivery extends Model
{
    use HasFactory;

    protected $fillable =[
        "reference_no", "sale_id", "user_id", "address", "delivered_by", "recieved_by", "file", "status", "note"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleDeliveryFactory::new();
    }

    public function sale()
    {
    	return $this->belongsTo("Modules\Petcare\Entities\Sale");
    }

    public function user()
    {
    	return $this->belongsTo("App\Models\User");
    }
}
