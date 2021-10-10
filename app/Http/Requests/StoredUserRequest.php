<?php

namespace App\Http\Requests;

use App\Rules\DDDPhone;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoredUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:190', new FullName],
            'email' => ['required', 'max:190'],
            'data_nascimento' => ['required', 'date_format:d/m/Y','before:today'],
            'telefone' => ['required', new DDDPhone],
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'Nome obrigatório!',
            'nome.max' => 'Não pode ser maior :max caracteres!',

            'email.required' => 'Email obrigatório!',
            'email.max' => 'Não pode ser maior :max caracteres!',

            'data_nascimento.required' => 'Data de nascimento obrigatório!',
            'data_nascimento.date_format' => 'Data de nascimento com formato inválido! (:format)',
            'data_nascimento.before' => 'Data nascimento inválido!',
            

            'telefone.required' => 'Telefone obrigatório!',
        ];
    }
}
