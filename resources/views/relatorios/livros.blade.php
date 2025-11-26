@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Relatório de Livros agrupado por Autor</h2>
</div>

<div class="row">

@php $autorAtual = null; @endphp

@forelse ($dados as $linha)
    @if ($autorAtual !== $linha->autor_id)
        @if ($autorAtual !== null)
            <hr>
        @endif

        <h3>{{ $linha->autor_nome }}</h3>
        @php $autorAtual = $linha->autor_id; @endphp
    @endif

    <div style="margin-left:20px;">
        <strong>Livro:</strong> {{ $linha->livro_titulo }}  
        <br>
        <strong>Editora:</strong> {{ $linha->livro_editora ?? '---' }}  
        <br>
        <strong>Edição:</strong> {{ $linha->livro_edicao ?? '---' }}  
        <br>
        <strong>Ano:</strong> {{ $linha->livro_ano_publicacao ?? '---' }}  
        <br>
        <strong>Assunto:</strong> {{ $linha->assunto_descricao ?? '---' }}
        <br><br>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Nenhum livro cadastrado.
        </div>
    </div>
@endforelse
</div>
@endsection
