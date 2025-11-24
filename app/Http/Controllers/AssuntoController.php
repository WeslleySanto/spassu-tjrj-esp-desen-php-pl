<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\AssuntoService;
use App\Http\Requests\AssuntoRequest;
use Illuminate\Http\RedirectResponse;

class AssuntoController extends Controller
{
    /**
     * AssuntoController constructor.
     *
     * @param AssuntoService $assuntoService
     */
    public function __construct(
        private AssuntoService $assuntoService,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $assuntos = $this->assuntoService->index();
        return view('assuntos.index', compact('assuntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('assuntos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssuntoRequest $request
     * @return RedirectResponse
     */
    public function store(AssuntoRequest $request): RedirectResponse
    {
        $this->assuntoService->store($request->validated());
        return redirect()
            ->route('assuntos.index')
            ->with('success', 'Assunto cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id
     * @return View
     */
    public function edit(int $id): View
    {
        $as = $this->assuntoService->findOrFail($id);
        return view('assuntos.edit', compact('as'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssuntoRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(AssuntoRequest $request, int $id): RedirectResponse
    {
        $this->assuntoService->update($request->validated(), $id);

        return redirect()
            ->route('assuntos.index')
            ->with('success', 'Assunto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->assuntoService->destroy($id);
        return redirect()
            ->route('assuntos.index')
            ->with('success', 'Assunto excluído com sucesso!');
    }
}
