<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class LivroRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'Titulo' => 'required|string|max:40',
            'Editora' => 'nullable|string|max:40',
            'Edicao' => 'nullable|numeric',
            'AnoPublicacao' => 'nullable|string|max:4',
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autores,CodAu',
            'assuntos' => 'nullable|array',
            'assuntos.*' => 'exists:assuntos,codAs',
        ];
    }

    public function messages(): array
    {
        return [
            'Titulo.required' => 'O título é obrigatório.',
            'autores.*.exists' => 'Autor inválido.',
            'assuntos.*.exists' => 'Assunto inválido.',
        ];
    }
}
