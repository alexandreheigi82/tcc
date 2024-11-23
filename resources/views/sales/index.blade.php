@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Lista de Vendas</h2>

    <!-- Campo de Pesquisa -->
    <form action="{{ route('sales.index') }}" method="GET" class="mb-4 flex justify-center space-x-4">
        <input type="text" name="search" placeholder="Pesquisar vendas" value="{{ request()->input('search') }}" class="w-full p-2 rounded bg-gray-700 text-white">
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Pesquisar</button>
    </form>

    @if(request()->has('search'))
    <div class="text-center mb-4">
        <a href="{{ route('sales.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500">Voltar à Lista de Vendas</a>
    </div>
    @endif

    <!-- Lista de Vendas -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-2 border-b border-gray-600">ID Venda</th>
                    <th class="p-2 border-b border-gray-600">Cliente</th>
                    <th class="p-2 border-b border-gray-600">Pacote</th>
                    <th class="p-2 border-b border-gray-600">Quantidade</th>
                    <th class="p-2 border-b border-gray-600">ID Vendedor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                @if ($sale->package)
                <tr class="bg-gray-800 hover:bg-gray-700">
                    <td class="p-2 border-b border-gray-600"><a href="{{ route('sales.show', ['sale' => $sale->id]) }}" class="text-blue-400 hover:underline"><strong>{{ $sale->id }}</strong></a></td>
                    <td class="p-2 border-b border-gray-600">{{ $sale->client->nome }} {{ $sale->client->sobrenome }}</td>
                    <td class="p-2 border-b border-gray-600">{{ $sale->package->titulo }}</td>
                    <td class="p-2 border-b border-gray-600">{{ $sale->quantidade }}</td>
                    <td class="p-2 border-b border-gray-600">{{ $sale->user_id }}</td>
                </tr>
                @else
                <tr class="bg-gray-800 hover:bg-gray-700">
                    <td colspan="5" class="p-2 border-b border-gray-600 text-center">Pacote relacionado foi removido.</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
