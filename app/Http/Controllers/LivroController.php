<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Services\AutorService;
use App\Services\LivroService;
use App\Services\AssuntoService;
use App\Http\Requests\LivroRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LivroController extends Controller
{
    /**
     * AutorController constructor.
     *
     * @param LivroService $livroService
     * @param AutorService $autorService
     * @param AssuntoService $assuntoService
     */
    public function __construct(
        private LivroService $livroService,
        private AutorService $autorService,
        private AssuntoService $assuntoService,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $livros = $this->livroService->index();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $autores = $this->autorService->index();
        $assuntos = $this->assuntoService->index();
        return view('livros.create', compact('autores', 'assuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LivroRequest $request
     * @return RedirectResponse
     */
    public function store(LivroRequest $request): RedirectResponse
    {
        $this->livroService->store($request->validated());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $livro = $this->livroService->findOrFail($id);
        $autores = $this->autorService->index();
        $assuntos = $this->assuntoService->index();
        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LivroRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(LivroRequest $request, int $id): RedirectResponse
    {
        $this->livroService->update($id, $request->validated());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Delete a Livro by its ID
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->livroService->destroy($id);
        return redirect()->route('livros.index');
    }
}
