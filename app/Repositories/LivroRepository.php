<?php

namespace App\Repositories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class LivroRepository
{
    /**
     * Get all Livros
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return Livro::with(['autores', 'assuntos'])->get();
    }

    /**
     * Create a new Livro
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        Livro::create($data);
    }

    /**
     * Find an Livro by its ID or fail
     *
     * @param integer $id
     * @return Livro
     */
    public function findOrFail(int $id): Livro
    {
        return Livro::findOrFail($id);
    }

    /**
     * Delete an Livro by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Livro::destroy($id);
    }
}
