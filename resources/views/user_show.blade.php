@extends('master')

@section('content')

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4 text-[#6cb3c3]">Detalhes do Usuário</h2>

        @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="mb-4">
            <p><strong>Nome:</strong> {{ $user->nome }}</p>
            <p><strong>Sobrenome:</strong> {{ $user->sobrenome }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Ativo:</strong> {{ $user->situacao ? 'Sim' : 'Não' }}</p>
        </div>

        <div class="flex justify-between mb-4">
            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-400">Editar</a>
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Excluir</button>
            </form>
        </div>

        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500">Voltar ao Painel de Controle</a>
        </div>
    </div>
</div>

@endsection
