@extends('layout')

@section('content')
<h2>Novo Autor</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('autores.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" class="form-control" value="{{ old('Nome') }}">
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
