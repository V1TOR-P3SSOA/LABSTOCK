<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLoan extends FormRequest
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
            'equipment_id' => [
                'required',
                'exists:equipments,id'
            ],
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'borrow_date' => [
                'required',
                'date'
            ],
            'return_date' => [
                'nullable',
                'date',
                'after_or_equal:borrow_date'
            ],
            'status' => [
                'required',
                'in:Empréstimo,Devolvido'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'equipment_id.required' => 'O campo equipamento é obrigatório.',
            'equipment_id.exists' => 'O equipamento selecionado não existe.',
            'user_id.required' => 'O campo usuário é obrigatório.',
            'user_id.exists' => 'O usuário selecionado não existe.',
            'borrow_date.required' => 'O campo data de empréstimo é obrigatório.',
            'borrow_date.date' => 'O campo data de empréstimo deve ser uma data válida.',
            'return_date.date' => 'O campo data de devolução deve ser uma data válida.',
            'return_date.after_or_equal' => 'A data de devolução deve ser igual ou posterior à data de empréstimo.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O campo status deve ser "Empréstimo" ou "Devolvido".',
        ];
    }  
}
