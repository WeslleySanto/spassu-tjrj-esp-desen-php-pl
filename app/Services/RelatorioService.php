<?php

namespace App\Services;

use App\Helpers\FormatHelper;
use App\Repositories\RelatorioRepository;
use Illuminate\Support\Collection as CollectionSupport;

class RelatorioService
{
    /**
     * RelatorioService constructor.
     *
     * @param RelatorioRepository $relatorioRepository
     */
    public function __construct(
        private RelatorioRepository $relatorioRepository,
        private FormatHelper $formatHelper,
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
            $linha->valor_formatado = $this->formatHelper->moeda($linha->livro_valor);
            $linha->ano_formatado = $linha->livro_ano_publicacao ?: '---';
            $linha->editora_formatada = $linha->livro_editora ?: '---';
            $linha->edicao_formatada = $linha->livro_edicao ?: '---';
            $linha->assunto_formatado = $linha->assunto_descricao ?: '---';

            return $linha;
        });
    }
}
