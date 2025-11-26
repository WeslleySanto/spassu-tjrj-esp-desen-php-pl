@extends('layout')

@section('content')

<h2>Relatório de Livros agrupado por Autor</h2>

@if ($dados->isEmpty())
    <div class="alert alert-info text-center">Nenhum livro cadastrado.</div>
@else

    @php $autorAtual = null @endphp

    @foreach ($dados as $linha)

        @if ($autorAtual !== $linha->autor_id)
            @if ($autorAtual !== null)
                <hr>
            @endif

            <h3>{{ $linha->autor_nome }}</h3>

            @php $autorAtual = $linha->autor_id; @endphp
        @endif

        <div style="margin-left:20px;">
            <strong>Livro:</strong> {{ $linha->livro_titulo }}<br>
            <strong>Editora:</strong> {{ $linha->editora_formatada }}<br>
            <strong>Edição:</strong> {{ $linha->edicao_formatada }}<br>
            <strong>Ano:</strong> {{ $linha->ano_formatado }}<br>
            <strong>Valor:</strong> {{ $linha->valor_formatado }}<br>
            <strong>Assunto:</strong> {{ $linha->assunto_formatado }}<br><br>
        </div>

    @endforeach

@endif

@endsection
