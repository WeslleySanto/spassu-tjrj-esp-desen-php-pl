<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AssuntoRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/AssuntoRequestTest.php::testRules
     */
    public function rules(): array
    {
        return [
            'Descricao' => 'required|string|max:20',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/AssuntoRequestTest.php::testMessages
     */
    public function messages(): array
    {
        return [
            'Descricao.required' => 'A descrição é obrigatória.',
            'Descricao.max' => 'A descrição deve ter no máximo 20 caracteres.',
        ];
    }
}
