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
            'formula.required' => 'O campo fórmula é obrigatório.',
            'quantity.required' => 'O campo quantidade é obrigatório.',
            'quantity.numeric' => 'O campo quantidade deve ser um número.',
            'quantity.min' => 'O campo quantidade deve ser no mínimo 0.',
            'unit.required' => 'O campo unidade é obrigatório.',
        ];
    }
}
