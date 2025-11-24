<?php

namespace Tests\Unit\App\Http\Requests;

use App\Http\Requests\AutorRequest;
use Tests\TestCase;

class AutorRequestTest extends TestCase
{
    protected $autorRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->autorRequest = new AutorRequest();
    }

    public function testRules(): void
    {
        $rules = $this->autorRequest->rules();

        $this->assertArrayHasKey('Nome', $rules);

        $this->assertEquals('required|string|max:40', $rules['Nome']);
    }

    public function testMessages(): void
    {
        $messages = $this->autorRequest->messages();

        $this->assertArrayHasKey('Nome.required', $messages);
        $this->assertArrayHasKey('Nome.max', $messages);

        $this->assertEquals("O nome do autor é obrigatório.", $messages['Nome.required']);
        $this->assertEquals("O nome do autor deve ter no máximo 40 caracteres.", $messages['Nome.max']);
    }
}
