<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\insertUpdateUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\permissao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Gate;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('utilizadores', ['user' => $users, 'utilizador' => 'active']);
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
        $validacao = new insertUpdateUser;

        $erro = Validator::make($request->all(), $validacao->rules(), $validacao->messages());
        if($erro->fails())
            return json_encode(['errors'=>$erro->errors()->all()]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json(['success' => 'Dados Adicionados Com Sucesso.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (Gate::denies('Editar', $user)) {
            abort('403', 'unauthorized');
        }

        $papeis    = $user->papeis; 
        return view('utilizadoresRoles', 
            [
                'papeis'     => $papeis, 
                'user'       => $user
            ]
        );
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

            $data = User::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $rules = $request->validate([
            'name' => 'required',
            'email'  => 'required',
        ]);

        // $error = Validator::make($request->only(['name', 'email']), $rules);

        // if ($error->fails()) {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }

        $dados_form = array(
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request['password']),
        );

        User::whereId($request->hidden_id)->update($dados_form);
        return response()->json(['success' => 'Dados Alterado Com Sucesso.']);

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
