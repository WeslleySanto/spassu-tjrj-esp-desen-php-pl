@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Livros</h2>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">+ Novo Livro</a>
</div>

<div class="row">
    @forelse($livros as $livro)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-header">
                <strong>{{ $livro->Titulo }}</strong>
            </div>
            <div class="card-body">
                <p><strong>Editora:</strong> {{ $livro->editora_formatada }}</p>
                <p><strong>Edição:</strong> {{ $livro->edicao_formatada }}</p>
                <p><strong>Ano:</strong> {{ $livro->ano_formatado }}</p>
                <p><strong>Valor:</strong> {{ $livro->valor_formatado }}</p>
                <p><strong>Autores:</strong> {!! $livro->autores_formatados !!}</p>
                <p><strong>Assuntos:</strong> {!! $livro->assuntos_formatados !!}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('livros.edit', $livro->CodL) }}" class="btn btn-sm btn-warning">Editar</a>
                
                <form action="{{ route('livros.destroy', $livro->CodL) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </div>
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
