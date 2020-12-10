<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\universidade;
use Validator;

class universidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar universidades cadastradas pelo user que logou
        //$dados = universidade::where('id_utilizador', auth()->user()->id)->get();

        //Listar todas as universidades
        $dados = universidade::all();
        return view('instituicoes', ['instituicao' => 'active', 'dados' => $dados]);
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
        $rules = array(
            'nome_universidade' => 'required',
            'apelido'           => 'required',
            'localizacao'       => 'required');

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nome_universidade' => $request->nome_universidade,
            'user_id'           => auth()->user()->id,
            'apelido'           => $request->apelido,
            'localizacao'       => $request->localizacao);

        universidade::create($form_data);
        return response()->json(['success' => 'Universidade cadastrada com sucessso']);
    
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

    public function list()
    {
        if (request()->ajax()) {

            $data = universidade::all();

            return response()->json(['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {

            $data = universidade::findOrFail($id);

            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'nome_universidade' => 'required',
            'apelido'           => 'required',
            'localizacao'       => 'required');

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nome_universidade' => $request->nome_universidade,
            'user_id'           => auth()->user()->id,
            'apelido'           => $request->apelido,
            'localizacao'       => $request->localizacao);

        universidade::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Dados editados com sucessso']);
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
