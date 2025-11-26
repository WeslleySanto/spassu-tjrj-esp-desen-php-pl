<?php

namespace App\Repositories;

use Illuminate\Support\Collection as CollectionSupport;
use Illuminate\Support\Facades\DB;

class RelatorioRepository
{
    /**
     * Get a collection of livros.
     *
     * @return CollectionSupport
     */
    public function getLivros(): CollectionSupport
    {
        return DB::table('view_livros_autores')
            ->orderBy('autor_nome')
            ->orderBy('livro_titulo')
            ->orderBy('assunto_descricao')
            ->get();
    }
}
