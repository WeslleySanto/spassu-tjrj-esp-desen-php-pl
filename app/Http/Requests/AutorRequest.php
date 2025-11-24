<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AutorRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/AutorRequestTest.php::testRules
     */
    public function rules(): array
    {
        return [
            'Nome' => 'required|string|max:40',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     * 
     * @covers tests/Unit/App/Http/Requests/AutorRequestTest.php::testMessages
     */
    public function messages(): array
    {
        return [
            'Nome.required' => 'O nome do autor é obrigatório.',
            'Nome.max' => 'O nome do autor deve ter no máximo 40 caracteres.',
        ];
    }
}
