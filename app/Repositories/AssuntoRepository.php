<?php

namespace App\Repositories;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class AssuntoRepository
{
    /**
     * Get all Assuntos
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return Assunto::all();
    }

    /**
     * Create a new Assunto
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        Assunto::create($data);
    }

    /**
     * Find an Assunto by its ID or fail
     *
     * @param integer $id
     * @return Assunto
     */
    public function findOrFail(int $id): Assunto
    {
        return Assunto::findOrFail($id);
    }

    /**
     * Delete an Assunto by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Assunto::destroy($id);
    }
}
