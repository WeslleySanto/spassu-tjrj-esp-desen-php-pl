<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AssuntoRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'Descricao' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'Descricao.required' => 'A descrição é obrigatória.',
        ];
    }
}
