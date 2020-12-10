<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faculdade extends Model
{
    protected $fillable = [
        'universidade_id', 'user_id', 'nome_faculdade',
    ];
}
