@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Autores</h2>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">+ Novo Autor</a>
</div>

<div class="row">
    @forelse($autores as $autor)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <p><strong>Código:</strong> {{ $autor->CodAu }}</p>
                <p><strong>Nome:</strong> {{ $autor->Nome }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST">
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
            Nenhum autor cadastrado.
        </div>
    </div>
    @endforelse
</div>
@endsection
