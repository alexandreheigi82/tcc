@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-400">Painel de Controle</h2>

    @if (Auth::check())
    <h3 class="text-xl text-center mb-4">Bem-vindo, {{ Auth::user()->nome }}!</h3>
    @endif

    <p class="text-center mb-8">Aqui você pode gerenciar clientes, pacotes de turismo e usuários.</p>

    <!-- Sessão de Clientes -->
    <div class="mb-8">
        <h3 class="text-xl font-bold mb-2 text-center text-blue-400">Clientes</h3>
        <div class="text-center">
            <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400 mx-2">Cadastrar Novo Cliente</a>
            <a href="{{ route('clients.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500 mx-2">Visualizar Clientes</a>
        </div>
    </div>

    <!-- Sessão de Pacotes de Turismo -->
    <div class="mb-8">
        <h3 class="text-xl font-bold mb-2 text-center text-blue-400">Pacotes de Turismo</h3>
        <div class="text-center">
            <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400 mx-2">Criar Pacote de Turismo</a>
            <a href="{{ route('packages.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500 mx-2">Ver Pacotes de Turismo</a>
        </div>
    </div>

    <!-- Sessão de Usuários -->
    <div class="mb-8">
        <h3 class="text-xl font-bold mb-2 text-center text-blue-400">Usuários</h3>
        <div class="text-center">
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400 mx-2">Cadastrar Novo Usuário</a>
            <a href="{{ route('users.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500 mx-2">Visualizar Usuários</a>
        </div>
    </div>

    <!-- Sessão de Vendas -->
    <div>
        <h3 class="text-xl font-bold mb-2 text-center text-blue-400">Vendas</h3>
        <div class="text-center">
            <a href="{{ route('sales.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400 mx-2">Efetuar Venda</a>
            <a href="{{ route('sales.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-500 mx-2">Visualizar Vendas</a>
        </div>
    </div>
</div>
@endsection
