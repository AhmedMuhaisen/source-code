<?php

namespace Modules\Petcare\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Petcare\Entities\Skill;
class Trainer extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\TrainerFactory::new();
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id')->withDefault();
     }
    
     public function skills_filter(){
        $skills=Skill::get();
        $skills_array=[];
        if(is_array(json_decode($this->skills))){
        foreach($skills as $skill){
        if(in_array($skill->id,json_decode($this->skills))){
        $skills_array[]=['id'=>$skill->id,'name'=>$skill->name];
                }}}
            return $skills_array; 
                                            
            }
}
