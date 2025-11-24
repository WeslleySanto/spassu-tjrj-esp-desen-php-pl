<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AutorRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'Nome' => 'required|string|max:40',
        ];
    }

    public function messages(): array
    {
        return [
            'Nome.required' => 'O nome do autor é obrigatório.',
        ];
    }
}
