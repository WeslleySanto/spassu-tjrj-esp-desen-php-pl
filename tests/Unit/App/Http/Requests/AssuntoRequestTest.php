<?php

namespace Tests\Unit\App\Http\Requests;

use Tests\TestCase;
use App\Http\Requests\AssuntoRequest;

class AssuntoRequestTest extends TestCase
{
    protected $assuntoRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->assuntoRequest = new AssuntoRequest();
    }

    public function testRules(): void
    {
        $rules = $this->assuntoRequest->rules();

        $this->assertArrayHasKey('Descricao', $rules);

        $this->assertEquals('required|string|max:20', $rules['Descricao']);
    }

    public function testMessages(): void
    {
        $messages = $this->assuntoRequest->messages();

        $this->assertArrayHasKey('Descricao.required', $messages);
        $this->assertArrayHasKey('Descricao.max', $messages);

        $this->assertEquals("A descrição é obrigatória.", $messages['Descricao.required']);
        $this->assertEquals("A descrição deve ter no máximo 20 caracteres.", $messages['Descricao.max']);
    }
}
