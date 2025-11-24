@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Assuntos</h2>
    <a href="{{ route('assuntos.create') }}" class="btn btn-primary">+ Novo Assunto</a>
</div>

<div class="row">
    @forelse($assuntos as $as)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <p><strong>Código:</strong> {{ $as->codAs }}</p>
                <p><strong>Descrição:</strong> {{ $as->Descricao }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('assuntos.edit', $as->codAs) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('assuntos.destroy', $as->codAs) }}" method="POST">
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
            Nenhum assunto cadastrado.
        </div>
    </div>
    @endforelse
</div>
@endsection
