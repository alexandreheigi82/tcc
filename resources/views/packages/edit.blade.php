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
        <div>
            <label for="link">Link:</label>
            <input type="url" id="link" name="link" value="{{ $package->link }}">
        </div>
        <div>
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="Passagens" {{ $package->categoria == 'Passagens' ? 'selected' : '' }}>Passagens</option>
                <option value="Hotéis" {{ $package->categoria == 'Hotéis' ? 'selected' : '' }}>Hotéis</option>
                <option value="Pacotes" {{ $package->categoria == 'Pacotes' ? 'selected' : '' }}>Pacotes</option>
                <option value="Cruzeiros" {{ $package->categoria == 'Cruzeiros' ? 'selected' : '' }}>Cruzeiros</option>
            </select>
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="Tranquilo" {{ $package->tipo == 'Tranquilo' ? 'selected' : '' }}>Tranquilo</option>
                <option value="Urbano" {{ $package->tipo == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                <option value="Religioso" {{ $package->tipo == 'Religioso' ? 'selected' : '' }}>Religioso</option>
                <option value="Ecoturismo" {{ $package->tipo == 'Ecoturismo' ? 'selected' : '' }}>Ecoturismo</option>
                <option value="Internacional" {{ $package->tipo == 'Internacional' ? 'selected' : '' }}>Internacional</option>
                <option value="Gastronômico" {{ $package->tipo == 'Gastronômico' ? 'selected' : '' }}>Gastronômico</option>
                <option value="Esportivo" {{ $package->tipo == 'Esportivo' ? 'selected' : '' }}>Esportivo</option>
            </select>
        </div>
        <div>
            <label for="situacao">Ativo:</label>
            <input type="checkbox" id="situacao" name="situacao" {{ $package->situacao ? 'checked' : '' }}>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('packages.index') }}'">Cancelar</button>
    </form>
@endsection
