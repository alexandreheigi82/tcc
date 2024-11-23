@extends('master')

@section('content')

<div class="bg-black text-white min-h-screen p-6 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Editar Usuário</h2>

        @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session()->get('message') }}
        </div>
        @endif

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-4">
                <input type="text" name="nome" value="{{ $user->nome }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <input type="text" name="sobrenome" value="{{ $user->sobrenome }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <input type="email" name="email" value="{{ $user->email }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <input type="password" name="senha" placeholder="Nova Senha (opcional)" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4 flex items-center">
                <label class="mr-2">Ativo:</label>
                <input type="checkbox" name="situacao" value="1" {{ $user->situacao ? 'checked' : '' }} class="bg-gray-700 text-blue-400">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Atualizar</button>
                <button type="button" onclick="window.location.href='{{ route('dashboard') }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@endsection
