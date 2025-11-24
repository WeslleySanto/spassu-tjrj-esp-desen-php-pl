@extends('layout')

@section('content')
<h2>Editar Autor</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('autores.update', $autor->CodAu) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" class="form-control" value="{{ old('Nome', $autor->Nome) }}">
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
