<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class papel extends Model
{
    public function permissoes(){
        return $this->belongsToMany(\App\Models\permissao::class);
    }
}
