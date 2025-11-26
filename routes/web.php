<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return redirect()->route('livros.index');
});

Route::resource('livros', LivroController::class);
Route::resource('autores', AutorController::class);
Route::resource('assuntos', AssuntoController::class);
Route::get('/relatorio/livros', [RelatorioController::class, 'index'])->name('relatorio.livros');
Route::get('/relatorio/pdf', [RelatorioController::class, 'pdf'])->name('relatorio.pdf');