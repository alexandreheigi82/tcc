@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Pacotes Desativados</h2>

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
        </div>
    </div>
    @endforeach
    @else
    <p class="text-center">Nenhum pacote desativado disponível.</p>
    @endif
</div>
@endsection
