@extends('master')

@section('content')
    <h2>Lista de Clientes</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clients.create') }}">Cadastrar Novo Cliente</a>

    @if ($clients->isEmpty())
        <p>Nenhum cliente cadastrado.</p>
    @else
        <ul>
            @foreach ($clients as $client)
                <li>
                    <strong>{{ $client->nome }} {{ $client->sobrenome }}</strong><br>
                    Email: {{ $client->email }}<br>
                    Telefone: {{ $client->telefone }}<br>
                    Cidade: {{ $client->cidade }}<br>
                    Estado: {{ $client->estado }}<br>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
