<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Petcare\Database\factories\SkillsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
  
}
