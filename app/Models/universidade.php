<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class universidade extends Model
{
    protected $fillable = [
        'nome_universidade', 'user_id', 'apelido', 'localizacao',
    ];
}
