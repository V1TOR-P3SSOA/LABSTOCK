<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreUpdateLoan extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'equipment_id' => [
                'required',
                'exists:equipments,id',
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
                'in:Reservado,Emprestado,Devolvido'
            ],
        ];
    }

    /**
     * Adiciona a validação manual DEPOIS das regras acima.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            
            $equipmentId = $this->input('equipment_id');
            $userId = $this->input('user_id');
            $status = $this->input('status');
            $loanId = $this->route('loan') ? $this->route('loan')->id : null;
            if (in_array($status, ['Reservado', 'Emprestado'])) {
                $query = DB::table('loans')
                    ->where('equipment_id', $equipmentId)
                    ->where('user_id', $userId)
                    ->whereIn('status', ['Reservado', 'Emprestado']);
                if ($loanId) {
                    $query->where('id', '!=', $loanId);
                }
                $error = $query->exists();

                if ($error) {
                    $validator->errors()->add(
                        'equipment_id', 
                        'Este usuário já possui uma reserva ativa (Reservado ou Emprestado) para este equipamento.'
                    );
                }
            }
        });
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
            'status.in' => 'O campo status deve ser "Reservado","Emprestado" ou "Devolvido".',
        ];
    }  
}