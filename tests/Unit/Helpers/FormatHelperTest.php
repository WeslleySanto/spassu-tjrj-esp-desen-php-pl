<?php

namespace Tests\Unit\Helpers;

use App\Helpers\FormatHelper;
use Tests\TestCase;

class FormatHelperTest extends TestCase
{
    protected FormatHelper $formatHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->formatHelper = new FormatHelper();
    }

    public function testMoeda()
    {
        $result = $this->formatHelper->moeda(1234.56);
        $this->assertEquals('R$ 1.234,56', $result);
        $this->assertIsString($result);

        $result = $this->formatHelper->moeda(-1234.56);
        $this->assertEquals('R$ -1.234,56', $result);
        $this->assertIsString($result);

        $result = $this->formatHelper->moeda(0.0);
        $this->assertEquals('R$ 0,00', $result);
        $this->assertIsString($result);

        $result = $this->formatHelper->moeda(null);
        $this->assertEquals('R$ 0,00', $result);
        $this->assertIsString($result);

        $result = $this->formatHelper->moeda(10.123);
        $this->assertEquals('R$ 10,12', $result);
        $this->assertIsString($result);

        $result = $this->formatHelper->moeda(100);
        $this->assertEquals('R$ 100,00', $result);
        $this->assertIsString($result);
    }
}
