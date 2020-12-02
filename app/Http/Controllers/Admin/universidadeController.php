<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\universidade;

class universidadeController extends Controller
{
    public function index(){

    	//Listar universidades cadastradas pelo user que logou
    	//$dados = universidade::where('id_utilizador', auth()->user()->id)->get();

    	//Listar todas as universidades
    	$dados = universidade::all();
		return view('instituicoes', ['instituicao' => 'active', 'dados' => $dados]);
    }
}
