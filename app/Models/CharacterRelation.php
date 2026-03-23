<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterRelation extends Model
{
    protected $fillable = ['reason_en'];

    public function character(){
        return $this->belongsTo(Character::class);
    }
}
