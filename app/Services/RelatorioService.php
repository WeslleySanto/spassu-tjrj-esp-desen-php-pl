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
    public function gerarRelatorio()
    {
        $dados = $this->relatorioRepository->getLivros();

        return $dados->map(function ($linha) {
            $linha->valor_formatado = $this->formatarMoeda($linha->livro_valor);
            $linha->ano_formatado = $linha->livro_ano_publicacao ?: '---';
            $linha->editora_formatada = $linha->livro_editora ?: '---';
            $linha->edicao_formatada = $linha->livro_edicao ?: '---';
            $linha->assunto_formatado = $linha->assunto_descricao ?: '---';

            return $linha;
        });
    }

    /**
     * Format a value as currency.
     *
     * @param float $valor
     * @return void
     */
    private function formatarMoeda(float $valor)
    {
        if ($valor === null) {
            return 'R$ 0,00';
        }

        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}
