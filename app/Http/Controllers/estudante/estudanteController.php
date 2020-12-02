<?php

namespace App\Http\Controllers\estudante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\estudante;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class estudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nome'        => 'required|string|min:5|max:100',
            'num_bi'      => 'required|string|min:14',
            'num_tel'     => 'required|integer|min:9',
            'morada'      => 'required|string|max:50',
            'genero'      => 'required|',
            'data_nasc'   => 'required|date',
            'localizacao' => 'required|string',
            'nome_user'   => 'required|string|min:5|max:20',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|confirmed|string|min:8',
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => $request['nome_user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $dados = DB::table('estudantes')->insert([
            'nome_estudante' =>   $request['nome'],
            'user_id'  => $id,
            'bi_estudante' => $request['num_bi'],
            'telefone' => $request['num_tel'],
            'data_nascimento' => $request['data_nasc'],
            'genero_estudante' => $request['genero'],
            'localizacao_actual' => $request['localizacao'],
            'morada' => $request['morada'],
        ]);
                    
        if(!$dados)
            return redirect()->back();

        return redirect()->route('login')->with('sucesso', "Parabens ".$request['nome']." Registro Concluido com Sucesso, Insira as Credencias Para Fazer Login no Sistema");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
