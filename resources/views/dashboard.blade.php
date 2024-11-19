@extends('master')

@section('content')
    <h2>Painel de Controle</h2>

    @if (Auth::check())
        <h3>Bem-vindo, {{ Auth::user()->nome }}!</h3>
    @endif

    <p>Aqui você pode gerenciar clientes, pacotes de turismo e usuários.</p>

    <!-- Sessão de Clientes -->
     <br>
    <div>
        <h3><strong>Clientes</strong></h3>
        <a href="{{ route('clients.create') }}">Cadastrar Novo Cliente  |</a>
        <a href="{{ route('clients.index') }}" target="_blank">Visualizar Clientes</a>
    </div>

    <!-- Sessão de Pacotes de Turismo -->
     <br>
    <div>
        <h3><strong>Pacotes de Turismo</strong></h3>
        <a href="{{ route('packages.create') }}">Criar Pacote de Turismo  |</a>
        <a href="{{ route('packages.index') }}" target="_blank">Ver Pacotes de Turismo</a>
    </div>

    <!-- Sessão de Usuários -->
     <br>
    <div>
        <h3><strong>Usuários</strong></h3>
        <a href="{{ route('users.create') }}">Cadastrar Novo Usuário  |</a>
        <a href="{{ route('users.index') }}" target="_blank">Visualizar Usuários</a>
    </div>

    <!-- Sessão de Vendas -->
     <br>
    <div>
        <h3><strong>Vendas</strong></h3>
        <a href="{{ route('sales.create') }}">Efetuar Venda  |</a>
        <a href="{{ route('sales.index') }}" target="_blank">Visualizar Vendas</a>
    </div>
@endsection
