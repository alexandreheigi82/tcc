@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Editar Pacote</h2>

        <form action="{{ route('packages.update', ['package' => $package->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block mb-2">Título:</label>
                <input type="text" id="titulo" name="titulo" value="{{ $package->titulo }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="descricao" class="block mb-2">Descrição:</label>
                <textarea id="descricao" name="descricao" required class="w-full p-2 rounded bg-gray-700 text-white">{{ $package->descricao }}</textarea>
            </div>
            <div class="mb-4">
                <label for="valor" class="block mb-2">Valor:</label>
                <input type="number" step="0.01" id="valor" name="valor" value="{{ $package->valor }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="vagas" class="block mb-2">Vagas:</label>
                <input type="number" id="vagas" name="vagas" value="{{ $package->vagas }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="imagem" class="block mb-2">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="link" class="block mb-2">Link:</label>
                <input type="url" id="link" name="link" value="{{ $package->link }}" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="categoria" class="block mb-2">Categoria:</label>
                <select id="categoria" name="categoria" required class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="Passagens" {{ $package->categoria == 'Passagens' ? 'selected' : '' }}>Passagens</option>
                    <option value="Hotéis" {{ $package->categoria == 'Hotéis' ? 'selected' : '' }}>Hotéis</option>
                    <option value="Pacotes" {{ $package->categoria == 'Pacotes' ? 'selected' : '' }}>Pacotes</option>
                    <option value="Cruzeiros" {{ $package->categoria == 'Cruzeiros' ? 'selected' : '' }}>Cruzeiros</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="tipo" class="block mb-2">Tipo:</label>
                <select id="tipo" name="tipo" required class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="Tranquilo" {{ $package->tipo == 'Tranquilo' ? 'selected' : '' }}>Tranquilo</option>
                    <option value="Urbano" {{ $package->tipo == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                    <option value="Religioso" {{ $package->tipo == 'Religioso' ? 'selected' : '' }}>Religioso</option>
                    <option value="Ecoturismo" {{ $package->tipo == 'Ecoturismo' ? 'selected' : '' }}>Ecoturismo</option>
                    <option value="Internacional" {{ $package->tipo == 'Internacional' ? 'selected' : '' }}>Internacional</option>
                    <option value="Gastronômico" {{ $package->tipo == 'Gastronômico' ? 'selected' : '' }}>Gastronômico</option>
                    <option value="Esportivo" {{ $package->tipo == 'Esportivo' ? 'selected' : '' }}>Esportivo</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="situacao" class="block mb-2">Ativo:</label>
                <input type="checkbox" id="situacao" name="situacao" {{ $package->situacao ? 'checked' : '' }} class="bg-gray-700 text-blue-400">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Salvar</button>
                <button type="button" onclick="window.location='{{ route('packages.index') }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
