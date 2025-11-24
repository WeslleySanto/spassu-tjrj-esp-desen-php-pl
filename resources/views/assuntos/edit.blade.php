@extends('layout')

@section('content')
<h2>Editar Assunto</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('assuntos.update', $as->codAs) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao', $as->Descricao) }}">
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
