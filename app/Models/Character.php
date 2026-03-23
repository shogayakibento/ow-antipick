<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Character extends Model
{
    public function characterRelations(){
        return $this->hasMany(CharacterRelation::class);
    }

    // このキャラに有利なキャラからの relation（to_hero_id = this->id）
    public function counterRelations(){
        return $this->hasMany(CharacterRelation::class, 'to_hero_id');
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->name_en ?? $this->name);
    }
}
