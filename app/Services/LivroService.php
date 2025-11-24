<?php

namespace App\Services;

use App\Models\Livro;
use App\Repositories\LivroRepository;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class LivroService
{
    /**
     * LivroService constructor.
     *
     * @param LivroRepository $livroRepository
     */
    public function __construct(
        private LivroRepository $livroRepository,
    ) {}

    /**
     * Get all Livro
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return $this->livroRepository->index();
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
