<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\AutorService;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\RedirectResponse;

class AutorController extends Controller
{
    /**
     * AutorController constructor.
     *
     * @param AutorService $autorService
     */
    public function __construct(
        private AutorService $autorService,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $autores = $this->autorService->index();
        return view('autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('autores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AutorRequest $request
     * @return RedirectResponse
     */
    public function store(AutorRequest $request): RedirectResponse
    {
        $this->autorService->store($request->validated());

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id
     * @return View
     */
    public function edit(int $id): View
    {
        $autor = $this->autorService->findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AutorRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(AutorRequest $request, int $id): RedirectResponse
    {
        $this->autorService->update($request->validated(), $id);

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->autorService->destroy($id);
        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor excluído com sucesso!');
    }
}
