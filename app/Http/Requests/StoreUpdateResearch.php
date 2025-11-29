<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateResearch extends FormRequest
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
            'title'=>[
                'required',
                'string',
                'max:255'
            ],
            'start_date'=>[
                'required',
                'date'
            ],
            'end_date'=>[
                'nullable',
                'date','after_or_equal:start_date'
            ],
            'user_id'=>[
                'required',
                'exists:users,id'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O campo título deve ser um texto',
            'title.max' => 'O campo título não pode exceder 255 caracteres.',
            'start_date.required' => 'O campo data de início é obrigatório.',
            'start_date.date' => 'O campo data de início deve ser uma data válida.',
            'end_date.date' => 'O campo data de término deve ser uma data válida.',
            'end_date.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.',
            'user_id.required' => 'O campo usuário é obrigatório.',
            'user_id.exists' => 'O usuário selecionado não existe.',
        ];
    }
}
