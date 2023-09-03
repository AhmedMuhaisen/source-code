<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleCoupon extends Model
{
    use HasFactory;

    protected $fillable =[
        "code", "type", "amount", "minimum_amount", "user_id", "quantity", "used", "expired_date", "is_active"  
    ];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\SaleCouponFactory::new();
    }
    // user 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
