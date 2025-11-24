<?php

namespace App\Services;

use App\Models\Assunto;
use App\Repositories\AssuntoRepository;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

class AssuntoService
{
    /**
     * AssuntoService constructor.
     * 
     * @param AssuntoRepository $assuntoRepository
     */
    public function __construct(
        private AssuntoRepository $assuntoRepository,
    ) {}

    /**
     * Get all Assuntos
     *
     * @return CollectionDatabase
     */
    public function index(): CollectionDatabase
    {
        return $this->assuntoRepository->index();
    }

    /**
     * Create a new Assunto
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        $this->assuntoRepository->create($data);
    }

    /**
     * Find an Assunto by its ID or fail
     *
     * @param integer $id
     * @return Assunto
     */
    public function findOrFail(int $id): Assunto
    {
        return $this->assuntoRepository->findOrFail($id);
    }

    /**
     * Delete an Assunto by its ID
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->assuntoRepository->destroy($id);
    }
}
