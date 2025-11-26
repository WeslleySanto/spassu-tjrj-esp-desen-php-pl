<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class LivroRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/LivroRequestTest.php::testRules
     */
    public function rules(): array
    {
        return [
            'Titulo' => 'required|string|max:40',
            'Editora' => 'nullable|string|max:40',
            'Edicao' => 'nullable|numeric',
            'AnoPublicacao' => 'nullable|string|max:4',
            'Valor' => 'nullable|numeric|min:0',
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autores,CodAu',
            'assuntos' => 'nullable|array',
            'assuntos.*' => 'exists:assuntos,codAs',
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/LivroRequestTest.php::testMessages
     */
    public function messages(): array
    {
        return [
            'Titulo.required' => 'O título é obrigatório.',
            'Titulo.max' => 'O título deve ter no máximo 40 caracteres.',
            'Editora.max' => 'A editora deve ter no máximo 40 caracteres.',
            'Edicao.numeric' => 'A edição deve ser um número.',
            'AnoPublicacao.max' => 'O ano de publicação deve ter no máximo 4 caracteres.',
            'Valor.numeric' => 'O valor deve ser um número.',
            'Valor.min' => 'O valor deve ser no mínimo 0.',
            'autores.*.exists' => 'Autor inválido.',
            'assuntos.*.exists' => 'Assunto inválido.',
        ];
    }
}
