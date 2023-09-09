<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\base;
use App\Models\role;
use App\Models\restaurant;
use Modules\Petcare\Entities\Trainer;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
       
    ];



    public function restaurant(){
        return $this->belongsTo(restaurant::class,'restaurant_id')->withDefault();
     }

     public function product(){
        return $this->belongsToMany(product::class,'Cart');
     }

     public function trainer(){
      return $this->hasOne(Trainer::class,'user_id')->withDefault();
   }
     public function role(){
        return $this->belongsTo(role::class,'role_id')->withDefault();
     }
     public function permission(){
        return $this->hasMany(User::class,'user_id')->withDefault();
     }
}

