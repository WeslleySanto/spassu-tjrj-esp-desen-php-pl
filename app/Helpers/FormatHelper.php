<?php

namespace App\Helpers;

class FormatHelper
{
    /**
     * Format a value as currency. 
     *
     * @param float|null $valor
     * @return string
     * 
     * @covers tests/Unit/App/Helpers/FormatHelper.php::testMoeda
     */
    public function moeda(?float $valor): string
    {
        return $valor !== null ? 'R$ ' . number_format($valor, 2, ',', '.') : 'R$ 0,00';
    }
}
