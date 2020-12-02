<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
	protected $table = "estudantes";

    protected $fillable = [
    	'nome_estudante', 'id_utilizador',	'bi_estudante',	'data_nascimento',	'genero_estudante'
    ];
}
