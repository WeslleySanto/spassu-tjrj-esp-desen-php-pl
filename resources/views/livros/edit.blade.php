@extends('layout')

@section('content')
<h2>Editar Livro</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('livros.update', $livro->CodL) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo', $livro->Titulo) }}">
    </div>

    <div class="mb-3">
        <label>Editora</label>
        <input type="text" name="Editora" class="form-control" value="{{ old('Editora', $livro->Editora) }}">
    </div>

    <div class="mb-3">
        <label>Edição</label>
        <input type="number" name="Edicao" class="form-control" value="{{ old('Edicao', $livro->Edicao) }}">
    </div>

    <div class="mb-3">
        <label>Ano de Publicação</label>
        <input type="text" name="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao', $livro->AnoPublicacao) }}">
    </div>

    <div class="mb-3">
        <label>Autores</label>
        <select name="autores[]" class="form-control" multiple>
            @forelse($autores as $a)
                <option value="{{ $a->CodAu }}"
                    {{ (collect(old('autores', $livro->autores->pluck('CodAu')))->contains($a->CodAu)) ? 'selected' : '' }}>
                    {{ $a->Nome }}
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
                <option value="{{ $as->codAs }}"
                    {{ (collect(old('assuntos', $livro->assuntos->pluck('codAs')))->contains($as->codAs)) ? 'selected' : '' }}>
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
