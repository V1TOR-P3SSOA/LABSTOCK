<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateReagent extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'string',
                'max:255'
            ],
            'formula'=>[
                'required',
                'string',
                'max:255'
            ],
            'quantity'=>[
                'required',
                'numeric',
                'min:0'
            ],
            'unit'=>[
                'required',
                'string',
                'max:50'
            ],     
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O campo nome não pode exceder 255 caracteres.',
            'formula.required' => 'O campo fórmula é obrigatório.',
            'formula.string' => 'O campo fórmula deve ser um texto.',
            'formula.max' => 'O campo fórmula não pode exceder 255 caracteres.',
            'quantity.required' => 'O campo quantidade é obrigatório.',
            'quantity.numeric' => 'O campo quantidade deve ser um número.',
            'quantity.min' => 'O campo quantidade deve ser no mínimo 0.',
            'unit.required' => 'O campo unidade é obrigatório.',
            'unit.string' => 'O campo unidade deve ser um texto.',
            'unit.max' => 'O campo unidade não pode exceder 50 caracteres.',
        ];
    }
}
