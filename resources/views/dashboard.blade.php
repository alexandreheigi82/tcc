@extends('master')

@section('content')
    <h2>Painel de Controle</h2>
    @if (Auth::check())
        <h3>Bem-vindo, {{ Auth::user()->nome }}!</h3>
    @endif
    <p>Aqui você pode gerenciar clientes, pacotes de turismo e usuários.</p>

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

    <div>
        <h3>Vendas</h3>
        <a href="{{ route('sales.create') }}">Efetuar Venda</a>
        <h4>Lista de Vendas</h4>
        <table>
            <thead>
                <tr>
                    <th>ID Venda</th>
                    <th>Cliente</th>
                    <th>Pacote</th>
                    <th>Quantidade</th>
                    <th>ID Vendedor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td><a href="{{ route('sales.show', ['sale' => $sale->id]) }}">{{ $sale->id }}</a></td>
                        <td>{{ $sale->client->nome }} {{ $sale->client->sobrenome }}</td>
                        <td>{{ $sale->package->titulo }}</td>
                        <td>{{ $sale->quantidade }}</td>
                        <td>{{ $sale->user_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
