@extends('master')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h2 class="text-3xl font-bold text-center mb-6 text-[#6cb3c3]">Detalhes do Pacote</h2>

        @if ($package)
        <div class="mb-6">
            <h3 class="text-2xl font-bold mb-2 text-[#26535e]">{{ $package->titulo }}</h3>
            <p class="mb-4 text-[#26535e]">{{ $package->descricao }}</p>
            <p class="mb-4 text-[#26535e]">Valor: {{ $package->valor }}</p>
            <p class="mb-4 text-[#26535e]">Vagas: {{ $package->vagas }}</p>
            
            @if ($package->imagem)
            <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-4 w-48 rounded">
            @endif
            
            <a href="{{ $package->link }}" class="text-[#6cb3c3] hover:underline mb-4 block">Link: Fale conosco</a>
        </div>

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white py-3 px-6 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Voltar
            </a>
            <a href="{{ route('packages.edit', ['package' => $package->id]) }}" class="bg-yellow-500 text-white py-3 px-6 rounded-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                Editar
            </a>
            <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')" class="bg-red-500 text-white py-3 px-6 rounded-lg hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Excluir
                </button>
            </form>
        </div>

        @else
        <p class="text-center text-[#26535e]">Pacote não encontrado ou foi removido.</p>
        <div class="text-center mt-4">
            <a href="{{ route('packages.index') }}" class="bg-gray-500 text-white py-3 px-6 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Voltar para a lista de pacotes
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
