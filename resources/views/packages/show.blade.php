@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Detalhes do Pacote</h2>

        @if ($package)
        <div class="mb-4">
            <h3 class="text-xl font-bold mb-2">{{ $package->titulo }}</h3>
            <p class="mb-2">{{ $package->descricao }}</p>
            <p class="mb-2">Valor: {{ $package->valor }}</p>
            <p class="mb-2">Vagas: {{ $package->vagas }}</p>
            @if ($package->imagem)
            <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-4 w-48 rounded">
            @endif
            <a href="{{ $package->link }}" class="text-blue-500 hover:underline mb-4 block">Link: Fale conosco</a>
        </div>
        <div class="flex space-x-4 mb-4">
            <a href="{{ route('packages.index') }}" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Voltar</a>
            <a href="{{ route('packages.edit', ['package' => $package->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-400">Editar</a>
            <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Excluir</button>
            </form>
        </div>
        @else
        <p class="text-center">Pacote não encontrado ou foi removido.</p>
        <div class="text-center">
            <a href="{{ route('packages.index') }}" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Voltar para a lista de pacotes</a>
        </div>
        @endif
    </div>
</div>
@endsection
