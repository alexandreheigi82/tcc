@extends('master')

@section('content')
    <h2>Relatório da Venda #{{ $sale->id }}</h2>
    <p><strong>Cliente:</strong> {{ $sale->client->nome }} {{ $sale->client->sobrenome }}</p>
    <p><strong>Pacote:</strong> {{ $sale->package->titulo }}</p>
    <p><strong>Descrição:</strong> {{ $sale->package->descricao }}</p>
    <p><strong>Valor:</strong> R$ {{ $sale->package->valor }}</p>
    <p><strong>Quantidade:</strong> {{ $sale->quantidade }}</p>
    <p><strong>Vendedor:</strong> {{ $sale->user->nome }}</p>
    <a href="{{ route('dashboard') }}">Voltar ao Painel de Controle</a>
@endsection
