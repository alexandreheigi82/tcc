@extends('master')

@section('content')

<h2>Usuário - {{ $user->nome }}</h2>

@if (session()->has('message'))
{{ session()->get('message') }}
@endif

<p>Status: {{ $user->situacao ? 'Ativo' : 'Inativo' }}</p>

@if (!$user->situacao)
    <form action="{{ route('users.reactivate', ['user' => $user->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <button type="submit">Reativar Usuário</button>
    </form>
@else
    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Desativar Usuário</button>
    </form>
@endif

<a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar Usuário</a>

@endsection
