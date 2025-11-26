@extends('layout')

@section('content')
<h2>Novo Livro</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('livros.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo') }}">
    </div>

    <div class="mb-3">
        <label>Editora</label>
        <input type="text" name="Editora" class="form-control" value="{{ old('Editora') }}">
    </div>

    <div class="mb-3">
        <label>Edição</label>
        <input type="number" name="Edicao" class="form-control" value="{{ old('Edicao') }}">
    </div>

    <div class="mb-3">
        <label>Ano de Publicação</label>
        <input type="text" name="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao') }}">
    </div>

    <div class="mb-3">
        <label>Valor (R$)</label>
        <input type="number" name="Valor" class="form-control" step="0.01" min="0" value="{{ old('Valor') }}">
    </div>

    <div class="mb-3">
        <label>Autores</label>
        <select name="autores[]" class="form-control" multiple>
            @forelse($autores as $autor)
                <option value="{{ $autor->CodAu }}" {{ (collect(old('autores'))->contains($autor->CodAu)) ? 'selected' : '' }}>
                    {{ $autor->Nome }}
                </option>
            @empty
                <option disabled>Nenhum autor disponível</option>
            @endforelse
        </select>
    </div>

    <div class="mb-3">
        <label>Assuntos</label>
        <select name="assuntos[]" class="form-control" multiple>
            @forelse($assuntos as $as)
                <option value="{{ $as->codAs }}" {{ (collect(old('assuntos'))->contains($as->codAs)) ? 'selected' : '' }}>
                    {{ $as->Descricao }}
                </option>
            @empty
                <option disabled>Nenhum assunto disponível</option>
            @endforelse
        </select>
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
