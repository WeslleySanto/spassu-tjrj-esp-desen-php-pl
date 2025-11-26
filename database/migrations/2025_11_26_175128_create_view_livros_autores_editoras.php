<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         DB::statement("
            CREATE VIEW view_livros_autores AS
            SELECT 
                a.CodAu           AS autor_id,
                a.Nome            AS autor_nome,
                
                l.CodL            AS livro_id,
                l.Titulo          AS livro_titulo,
                l.Editora         AS livro_editora,
                l.Edicao          AS livro_edicao,
                l.AnoPublicacao   AS livro_ano_publicacao,
                
                s.codAs           AS assunto_id,
                s.Descricao       AS assunto_descricao

            FROM autores a
            JOIN livro_autor la       ON la.Autor_CodAu = a.CodAu
            JOIN livros l             ON l.CodL = la.Livro_Codl
            LEFT JOIN livro_assunto ls ON ls.Livro_Codl = l.CodL
            LEFT JOIN assuntos s       ON s.codAs = ls.Assunto_codAs

            ORDER BY a.Nome, l.Titulo
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_livros_autores");
    }
};
