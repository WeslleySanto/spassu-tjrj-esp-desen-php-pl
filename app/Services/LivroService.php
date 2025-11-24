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
     * @return void
     */
    public function store(array $data): void
    {
        $this->livroRepository->create($data);
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
