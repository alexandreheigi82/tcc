@extends('master')

@section('content')
    <h2>Painel de Controle</h2>
    <p>Bem-vindo ao seu painel de controle. Aqui você pode gerenciar clientes, pacotes de turismo e usuários.</p>

    <div>
        <h3>Clientes</h3>
        <a href="{{ route('clients.create') }}">Cadastrar Novo Cliente</a>
        <a href="{{ route('clients.index') }}">Visualizar Clientes</a>
    </div>

    <div>
        <h3>Pacotes de Turismo</h3>
        <a href="{{ route('packages.create') }}">Criar Pacote de Turismo</a>
        <a href="{{ route('packages.index') }}">Ver Pacotes de Turismo</a>
    </div>

    <div>
        <h3>Usuários</h3>
        <a href="{{ route('users.create') }}">Cadastrar Novo Usuário</a>
        <a href="{{ route('users.index') }}">Visualizar Usuários</a>
    </div>
@endsection
