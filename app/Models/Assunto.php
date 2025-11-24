<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'assuntos';
    protected $primaryKey = 'codAs';
    public $timestamps = false;

    protected $fillable = [
        'codAs', 'Descricao'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'Assunto_codAs', 'Livro_Codl');
    }
}
