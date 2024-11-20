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

<h2>Usuários Inativos</h2>
<ul>
    @foreach ($users as $user)
        @if (!$user->situacao)
            <li>
                {{ $user->nome }}
                | <a href="{{ route('users.show', ['user'=> $user->id]) }}">Visualizar</a>
                | <a href="{{ route('users.edit', ['user'=> $user->id]) }}">Editar</a>
                | <form action="{{ route('users.reactivate', ['user' => $user->id]) }}" method="post" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit">Ativar</button>
                </form>
            </li>
        @endif
    @endforeach
</ul>

<a href="{{ route('users.inactive') }}">Ver Usuários Inativos</a>

@endsection
