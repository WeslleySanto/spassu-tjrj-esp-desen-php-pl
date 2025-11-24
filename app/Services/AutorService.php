<?php

namespace App\Services;

use App\Models\Autor;
use App\Repositories\AutorRepository;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class AutorService
{
    /**
     * AutorService constructor.
     *
     * @param AutorRepository $autorRepository
     */
    public function __construct(
        private AutorRepository $autorRepository,
    ) {}

    /**
     * Get all Autor
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return $this->autorRepository->index();
    }

    /**
     * Create a new Autor
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        $this->autorRepository->create($data);
    }

    /**
     * Update an existing Autor
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update(array $data, int $id): void
    {
        $autor = $this->findOrFail($id);

        $this->autorRepository->update($data, $autor->id);
    }

    /**
     * Find an Autor by its ID or fail
     *
     * @param integer $id
     * @return Autor
     */
    public function findOrFail(int $id): Autor
    {
        return $this->autorRepository->findOrFail($id);
    }

    /**
     * Delete an Autor by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->autorRepository->destroy($id);
    }
}
