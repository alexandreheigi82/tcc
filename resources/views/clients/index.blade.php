@extends('master')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h2 class="text-3xl font-bold text-center mb-6 text-[#6cb3c3]">Lista de Clientes</h2>

        @if (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-6 text-center">
            <a href="{{ route('clients.create') }}" class="bg-[#6cb3c3] text-white font-bold py-2 px-4 rounded-lg hover:bg-[#547cac]">Cadastrar Novo Cliente</a>
        </div>

        @if ($clients->isEmpty())
        <p class="text-center text-[#26535e]">Nenhum cliente cadastrado.</p>
        @else
        <ul class="space-y-4">
            @foreach ($clients as $client)
            <li class="bg-[#f1f1f1] p-6 rounded-lg shadow-lg">
                <strong class="text-xl text-[#26535e]">{{ $client->nome }} {{ $client->sobrenome }}</strong><br>
                <span>Email: {{ $client->email }}</span><br>
                <span>Telefone: {{ $client->telefone }}</span><br>
                <span>Cidade: {{ $client->cidade }}</span><br>
                <span>Estado: {{ $client->estado }}</span><br>

                @auth <!-- Verifica se o usuário está autenticado -->
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-400">Editar</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-400">Excluir</button>
                    </form>
                </div>
                @endauth
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection
