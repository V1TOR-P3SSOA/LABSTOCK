<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEquipment extends FormRequest
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
            'asset_code'=>[
                'required',
                'string',
                'max:100',
            ],
            'status'=>[
                'required',
                'in:Reservado,Disponível'
            ],
            'last_calibration'=>[
                'nullable',
                'date'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O campo nome não pode exceder 255 caracteres.',
            'asset_code.required' => 'O campo código patrimonial é obrigatório.',
            'asset_code.string' => 'O campo código patrimonial deve ser um texto.',
            'asset_code.max' => 'O campo código patrimonial não pode exceder 100 caracteres.',
            'asset_code.unique' => 'O código patrimonial já está em uso.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O campo status deve ser "Reservado" ou "Disponível".',
            'last_calibration.date' => 'O campo última calibração deve ser uma data válida.',
        ];
    }
}
