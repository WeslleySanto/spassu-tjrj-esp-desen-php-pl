<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\View\View;
use App\Services\RelatorioService;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RelatorioController extends Controller
{
    /**
     * RelatorioController constructor.
     *
     * @param RelatorioService $relatorioService
     */
    public function __construct(
        private RelatorioService $relatorioService
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function web(): View
    {
        $dados = $this->relatorioService->gerarRelatorio();

        return view('relatorios.livros', compact('dados'));
    }

    /**
     * Generate PDF report
     *
     * @return  \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function pdf(): StreamedResponse
    {
        $dados = $this->relatorioService->gerarRelatorio();

        $html = view('relatorios.livros', compact('dados'))->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream("relatorio_livros_por_autor.pdf");
    }
}
