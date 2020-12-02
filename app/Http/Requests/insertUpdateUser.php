<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insertUpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return trye;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome do utilizador!',
            'name.min' => 'O nome deve conter no mínimo 5 caracteres!',
            'name.max' => 'O nome deve conter no máximo 255 caracteres!',
            'email.email' => 'Email inválido!',
            'email.unique' => 'Já existe utilizador com este email!',
            'email.required' => 'Informe o email do utilizador!',
            'email.max' => 'O email no máximo 255 caracteres!',
            'password.min' => 'A senha deve conter no mínimo 8 caracteres!',
        ];
    }
}
