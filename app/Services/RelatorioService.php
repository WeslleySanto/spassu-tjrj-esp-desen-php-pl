<?php

namespace App\Services;

use Illuminate\Support\Collection as CollectionSupport;
use App\Repositories\RelatorioRepository;

class RelatorioService
{
    /**
     * RelatorioService constructor.
     *
     * @param RelatorioRepository $relatorioRepository
     */
    public function __construct(
        private RelatorioRepository $relatorioRepository
    ) {}

    /**
     * Generate a report.
     *
     * @return CollectionSupport
     */
    public function gerarRelatorio(): CollectionSupport
    {
        return $this->relatorioRepository->getLivros();
    }
}
