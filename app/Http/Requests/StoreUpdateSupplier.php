<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupplier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'string',
                'max:255'
            ],
            'cnpj'=>[
                'required',
                'string',
                'max:20',
                'unique:suppliers,cnpj,' . $this->route('supplier')
            ],
            'email'=>[
                'required',
                'email',
                'max:255'
            ],
            'address'=>[
                'required',
                'string',
                'max:500'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O campo nome não pode exceder 255 caracteres.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.string' => 'O campo CNPJ deve ser um texto.',
            'cnpj.max' => 'O campo CNPJ não pode exceder 20 caracteres.',
            'cnpj.unique' => 'O CNPJ já está em uso.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode exceder 255 caracteres.',
            'address.required' => 'O campo endereço é obrigatório.',
            'address.string' => 'O campo endereço deve ser um texto.',
            'address.max' => 'O campo endereço não pode exceder 500 caracteres.',
        ];
    }
}
