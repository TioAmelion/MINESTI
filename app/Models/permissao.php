<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permissao extends Model
{
    public function papeis(){
        return $this->belongsToMany(\App\Models\papel::class);
    }
}
