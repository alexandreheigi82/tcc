@extends('master')

@section('content')
    <h2>Criar Pacote de Turismo</h2>
    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" required>
        </div>
        <div>
            <label for="vagas">Vagas:</label>
            <input type="number" id="vagas" name="vagas" required>
        </div>
        <div>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem">
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('home') }}'">Cancelar</button>
    </form>
@endsection
