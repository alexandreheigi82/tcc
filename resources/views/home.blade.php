@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    @if (Auth::check())
    <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Bem-vindo, {{ Auth::user()->nome }}</h2>
    <form action="{{ route('logout') }}" method="POST" class="text-center mb-4">
        @csrf
        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Logout</button>
    </form>
    <div class="text-center mb-8">
        <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400 mx-2">Criar Pacote de Turismo</a>
        <a href="{{ route('packages.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500 mx-2">Ver Pacotes de Turismo</a>
        <a href="{{ route('clients.create') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-400 mx-2">Cadastrar Novo Cliente</a>
    </div>
    @else
    <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Bem-vindo, visitante</h2>
    <div class="text-center mb-8">
        <a href="{{ route('login.form') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400">Login</a>
    </div>
    @endif

    <!-- Filtros de Categoria e Tipo -->
    <form method="GET" action="{{ route('home') }}" class="mb-8 flex justify-center space-x-4">
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

    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Pacotes Disponíveis</h2>
    @if ($packages->isNotEmpty())
    @foreach ($packages as $package)
    @if ($package->situacao)
    <div class="bg-gray-800 p-6 mb-4 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-2">{{ $package->titulo }}</h3>
        <p class="mb-2">{{ $package->descricao }}</p>
        <p class="mb-2">Valor: {{ $package->valor }}</p>
        <p class="mb-2">Vagas: {{ $package->vagas }}</p>
        @if ($package->imagem)
        <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-2 w-48 rounded">
        @endif
        <a href="{{ $package->link }}" class="text-blue-500 hover:underline mb-2 block">Link: Fale conosco</a>
        @if (Auth::check())
        <div class="flex space-x-4">
            <a href="{{ route('packages.show', ['package' => $package->id]) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-400">Detalhes</a>
            <a href="{{ route('packages.edit', ['package' => $package->id]) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-400">Editar</a>
            <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-400">Excluir</button>
            </form>
        </div>
        @endif
    </div>
    @endif
    @endforeach
    @else
    <p class="text-center">Nenhum pacote disponível.</p>
    @endif
</div>
@endsection
