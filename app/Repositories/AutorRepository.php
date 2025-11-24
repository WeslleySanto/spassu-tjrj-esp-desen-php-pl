<?php

namespace App\Repositories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class AutorRepository
{
    /**
     * Get all Autors
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return Autor::all();
    }

    /**
     * Create a new Autor
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        Autor::create($data);
    }

    /**
     * Find an Autor by its ID or fail
     *
     * @param integer $id
     * @return Autor
     */
    public function findOrFail(int $id): Autor
    {
        return Autor::findOrFail($id);
    }

    /**
     * Delete an Autor by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Autor::destroy($id);
    }
}
