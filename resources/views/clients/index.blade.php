@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Lista de Clientes</h2>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4 text-center">
        <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Cadastrar Novo Cliente</a>
    </div>

    @if ($clients->isEmpty())
    <p class="text-center">Nenhum cliente cadastrado.</p>
    @else
    <ul class="space-y-4">
        @foreach ($clients as $client)
        <li class="bg-gray-800 p-4 rounded shadow-lg">
            <strong class="text-xl">{{ $client->nome }} {{ $client->sobrenome }}</strong><br>
            <span>Email: {{ $client->email }}</span><br>
            <span>Telefone: {{ $client->telefone }}</span><br>
            <span>Cidade: {{ $client->cidade }}</span><br>
            <span>Estado: {{ $client->estado }}</span><br>
            <span>Status: {{ $client->situacao ? 'Ativo' : 'Inativo' }}</span><br>
            @auth <!-- Verifica se o usuário está autenticado -->
            <div class="mt-2 space-x-2">
                <a href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-400">Editar</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-400">Excluir</button>
                </form>
            </div>
            @endauth
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection
