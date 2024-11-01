@extends('master')

@section('content')
    <h2>Criar Pacote de Turismo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif






    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <div>
            <label for="price">Valor:</label>
            <input type="text" id="valor" name="valor" required>
        </div>
        <div>
            <label for="slots">Vagas:</label>
            <input type="number" id="vagas" name="vagas" required>
        </div>
        <div>
            <label for="image">Imagem:</label>
            <input type="file" id="imagem" name="imagem">
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('home') }}'">Cancelar</button>
    </form>
@endsection
