@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Pacotes de Turismo</h2>
    <div class="text-center mb-6">
        <a href="{{ route('packages.inactive') }}" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Ver Pacotes Desativados</a>
    </div>

    <!-- Filtros de Categoria e Tipo -->
    <form method="GET" action="{{ route('packages.index') }}" class="mb-6 flex justify-center space-x-4">
        <div>
            <label for="categoria" class="block mb-2">Categoria:</label>
            <select id="categoria" name="categoria" class="w-full p-2 rounded bg-gray-700 text-white">
                <option value="">Todas</option>
                <option value="Passagens">Passagens</option>
                <option value="Hotéis">Hotéis</option>
                <option value="Pacotes">Pacotes</option>
                <option value="Cruzeiros">Cruzeiros</option>
            </select>
        </div>
        <div>
            <label for="tipo" class="block mb-2">Tipo:</label>
            <select id="tipo" name="tipo" class="w-full p-2 rounded bg-gray-700 text-white">
                <option value="">Todos</option>
                <option value="Tranquilo">Tranquilo</option>
                <option value="Urbano">Urbano</option>
                <option value="Religioso">Religioso</option>
                <option value="Ecoturismo">Ecoturismo</option>
                <option value="Internacional">Internacional</option>
                <option value="Gastronômico">Gastronômico</option>
                <option value="Esportivo">Esportivo</option>
            </select>
        </div>
        <div class="flex items-end">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Filtrar</button>
        </div>
    </form>

    @if ($packages->isNotEmpty())
    @foreach ($packages as $package)
    <div class="bg-gray-800 p-6 mb-4 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-2">{{ $package->titulo }}</h3>
        <p class="mb-2">{{ $package->descricao }}</p>
        <p class="mb-2">Valor: {{ $package->valor }}</p>
        <p class="mb-2">Vagas: {{ $package->vagas }}</p>
        @if ($package->imagem)
        <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-2 w-48 rounded">
        @endif
        <a href="{{ $package->link }}" class="text-blue-500 hover:underline mb-2 block">Link: Fale conosco</a>
        <div class="flex space-x-4">
            <a href="{{ route('packages.show', ['package' => $package->id]) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-400">Detalhes</a>
            <a href="{{ route('packages.edit', ['package' => $package->id]) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-400">Editar</a>
            <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-400">Excluir</button>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <p class="text-center">Nenhum pacote disponível.</p>
    @endif
</div>
@endsection
