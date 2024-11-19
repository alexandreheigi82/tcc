@extends('master')

@section('content')
    <h2>Lista de Vendas</h2>

    <!-- Campo de Pesquisa -->
    <form action="{{ route('sales.index') }}" method="GET">
        <input type="text" name="search" placeholder="Pesquisar vendas" value="{{ request()->input('search') }}">
        <button type="submit">Pesquisar</button>
    </form>

    @if(request()->has('search'))
        <a href="{{ route('sales.index') }}" style="display: inline-block; margin-top: 20px;">Voltar à Lista de Vendas</a>
    @endif

    <!-- Lista de Vendas -->
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
                @if ($sale->package)
                    <tr>
                        <td><a href="{{ route('sales.show', ['sale' => $sale->id]) }}"><strong>{{ $sale->id }}</strong></a></td>
                        <td>{{ $sale->client->nome }} {{ $sale->client->sobrenome }}</td>
                        <td>{{ $sale->package->titulo }}</td>
                        <td>{{ $sale->quantidade }}</td>
                        <td>{{ $sale->user_id }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5">Pacote relacionado foi removido.</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
