@extends('master')

@section('content')

<a href="{{ route('users.create') }}">Criar Novo</a>
<hr>

<h2>Usuários Ativos</h2>
<ul>
    @foreach ($users as $user)
        @if ($user->situacao)
            <li>
                {{ $user->nome }}
                | <a href="{{ route('users.show', ['user'=> $user->id]) }}">Visualizar</a>
                | <a href="{{ route('users.edit', ['user'=> $user->id]) }}">Editar</a>
            </li>
        @endif
    @endforeach
</ul>

<hr>

<a href="{{ route('users.inactive') }}">Ver Usuários Inativos</a>

@endsection
