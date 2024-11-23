@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Criar Pacote de Turismo</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block mb-2">Título:</label>
                <input type="text" id="titulo" name="titulo" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="descricao" class="block mb-2">Descrição:</label>
                <textarea id="descricao" name="descricao" required class="w-full p-2 rounded bg-gray-700 text-white"></textarea>
            </div>
            <div class="mb-4">
                <label for="valor" class="block mb-2">Valor:</label>
                <input type="text" id="valor" name="valor" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="vagas" class="block mb-2">Vagas:</label>
                <input type="number" id="vagas" name="vagas" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="imagem" class="block mb-2">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="link" class="block mb-2">Link:</label>
                <input type="url" id="link" name="link" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="categoria" class="block mb-2">Categoria:</label>
                <select id="categoria" name="categoria" required class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="Passagens">Passagens</option>
                    <option value="Hotéis">Hotéis</option>
                    <option value="Pacotes">Pacotes</option>
                    <option value="Cruzeiros">Cruzeiros</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="tipo" class="block mb-2">Tipo:</label>
                <select id="tipo" name="tipo" required class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="Tranquilo">Tranquilo</option>
                    <option value="Urbano">Urbano</option>
                    <option value="Religioso">Religioso</option>
                    <option value="Ecoturismo">Ecoturismo</option>
                    <option value="Internacional">Internacional</option>
                    <option value="Gastronômico">Gastronômico</option>
                    <option value="Esportivo">Esportivo</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="situacao" class="block mb-2">Situação:</label>
                <select id="situacao" name="situacao" required class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Salvar</button>
                <button type="button" onclick="window.location='{{ route('home') }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
