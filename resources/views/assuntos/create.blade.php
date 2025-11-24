@extends('layout')

@section('content')
<h2>Novo Assunto</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('assuntos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Código</label>
        <input type="number" name="codAs" class="form-control" value="{{ old('codAs') }}">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao') }}">
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
