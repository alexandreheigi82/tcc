@extends('master')

@section('content')

<div class="bg-black text-white min-h-screen p-6">
    <div class="text-center mb-4">
        <a href="{{ route('users.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500">Voltar</a>
    </div>
    <hr class="mb-6 border-gray-700">

    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Usuários Inativos</h2>

    <ul class="space-y-4">
        @foreach ($users as $user)
        <li class="bg-gray-800 p-4 rounded-lg shadow-lg">
            <div class="flex justify-between items-center">
                <span>{{ $user->nome }}</span>
                <div class="space-x-2">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-400">Visualizar</a>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-400">Editar</a>
                    <form action="{{ route('users.reactivate', ['user' => $user->id]) }}" method="post" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400">Ativar</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection
