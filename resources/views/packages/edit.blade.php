@extends('master')

@section('content')
    <h2>Editar Pacote</h2>
    <form action="{{ route('packages.update', ['package' => $package->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ $package->titulo }}" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required>{{ $package->descricao }}</textarea>
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" name="valor" value="{{ $package->valor }}" required>
        </div>
        <div>
            <label for="vagas">Vagas:</label>
            <input type="number" id="vagas" name="vagas" value="{{ $package->vagas }}" required>
        </div>
        <div>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem">
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('packages.index') }}'">Cancelar</button>

        <div>
            <label for="link">Link:</label>
            <input type="link" id="link" name="link" value="{{ $package->link }}" required>
        </div>
    </form>
@endsection
