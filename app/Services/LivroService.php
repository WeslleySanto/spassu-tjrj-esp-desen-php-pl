<?php

namespace App\Services;

use App\Models\Livro;
use App\Helpers\FormatHelper;
use App\Repositories\LivroRepository;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class LivroService
{
    /**
     * LivroService constructor.
     *
     * @param LivroRepository $livroRepository
     * @param FormatHelper $formatHelper
     */
    public function __construct(
        private LivroRepository $livroRepository,
        private FormatHelper $formatHelper
    ) {}

    /**
     * Get all Livro
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        $livros = $this->livroRepository->index();

        return $livros->map(function ($livro) {
            $livro->valor_formatado     = $this->formatHelper->moeda($livro->Valor);
            $livro->editora_formatada   = $livro->Editora ?? 'N/A';
            $livro->edicao_formatada    = $livro->Edicao ?? 'N/A';
            $livro->ano_formatado       = $livro->AnoPublicacao ?? 'N/A';
            $livro->autores_formatados  = $this->getAutoresFormatados($livro->autores);
            $livro->assuntos_formatados = $this->getAssuntosFormatados($livro->assuntos);

            return $livro;
        });
    }

    /**
     * Get formatted authors
     *
     * @param CollectionDatabase $autores
     * @return string
     */
    protected function getAutoresFormatados(CollectionDatabase $autores): string
    {
        if ($autores->isEmpty()) {
            return 'Nenhum autor';
        }

        return $autores
            ->map(fn($a) => '<span class="badge bg-primary">' . e($a->Nome) . '</span>')
            ->implode(' ');
    }

    /**
     * Get formatted subjects
     *
     * @param CollectionDatabase $assuntos
     * @return string
     */
    protected function getAssuntosFormatados(CollectionDatabase $assuntos): string
    {
        if ($assuntos->isEmpty()) {
            return 'Nenhum assunto';
        }

        return $assuntos
            ->map(fn($a) => '<span class="badge bg-secondary">' . e($a->Descricao) . '</span>')
            ->implode(' ');
    }

    /**
     * Create a new Livro
     *
     * @param array $data
     * @return Livro
     */
    public function store(array $data): Livro
    {
        /** @var Livro $livro */
        $livro = $this->livroRepository->store($data);

        if (isset($data['autores'])) {
            $livro->autores()->sync($data['autores']);
        }

        if (isset($data['assuntos'])) {
            $livro->assuntos()->sync($data['assuntos']);
        }

        return $livro;
    }

    /**
     * Update an existing Livro
     *
     * @param int $id
     * @param array $data
     * @return Livro
     */
    public function update(int $id, array $data): Livro
    {
        /** @var Livro $livro */
        $livro = $this->livroRepository->update($id, $data);

        if (isset($data['autores'])) {
            $livro->autores()->sync($data['autores']);
        }

        if (isset($data['assuntos'])) {
            $livro->assuntos()->sync($data['assuntos']);
        }

        return $livro;
    }

    /**
     * Find an Livro by its ID or fail
     *
     * @param integer $id
     * @return Livro
     */
    public function findOrFail(int $id): Livro
    {
        return $this->livroRepository->findOrFail($id);
    }

    /**
     * Delete an Livro by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->livroRepository->destroy($id);
    }
}
