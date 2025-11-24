<?php

namespace Tests\Unit\App\Http\Requests;

use Tests\TestCase;
use App\Http\Requests\LivroRequest;

class LivroRequestTest extends TestCase
{
    protected $livroRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->livroRequest = new LivroRequest();
    }

    public function testRules(): void
    {
        $expectedRules = [
            'Titulo' => 'required|string|max:40',
            'Editora' => 'nullable|string|max:40',
            'Edicao' => 'nullable|numeric',
            'AnoPublicacao' => 'nullable|string|max:4',
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autores,CodAu',
            'assuntos' => 'nullable|array',
            'assuntos.*' => 'exists:assuntos,codAs',
        ];

        $this->assertEquals($expectedRules, $this->livroRequest->rules());
        
    }

    public function testMessages(): void
    {
        $expectedMessages = [
            'Titulo.required' => 'O título é obrigatório.',
            'Titulo.max' => 'O título deve ter no máximo 40 caracteres.',
            'Editora.max' => 'A editora deve ter no máximo 40 caracteres.',
            'Edicao.numeric' => 'A edição deve ser um número.',
            'AnoPublicacao.max' => 'O ano de publicação deve ter no máximo 4 caracteres.',
            'autores.*.exists' => 'Autor inválido.',
            'assuntos.*.exists' => 'Assunto inválido.',
        ];

        $this->assertEquals($expectedMessages, $this->livroRequest->messages());
    }
}
