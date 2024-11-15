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
        <div>
            <label for="link">Link:</label>
            <input type="url" id="link" name="link">
        </div>
        <div>
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="Passagens">Passagens</option>
                <option value="Hotéis">Hotéis</option>
                <option value="Pacotes">Pacotes</option>
                <option value="Cruzeiros">Cruzeiros</option>
            </select>
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="Tranquilo">Tranquilo</option>
                <option value="Urbano">Urbano</option>
                <option value="Religioso">Religioso</option>
                <option value="Ecoturismo">Ecoturismo</option>
                <option value="Internacional">Internacional</option>
                <option value="Gastronômico">Gastronômico</option>
                <option value="Esportivo">Esportivo</option>
            </select>
        </div>
        <div>
            <label for="situacao">Situação:</label>
            <select id="situacao" name="situacao" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('home') }}'">Cancelar</button>
    </form>
@endsection
