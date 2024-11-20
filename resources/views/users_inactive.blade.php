@extends('master')

@section('content')

<a href="{{ route('users.index') }}">Voltar</a>
<hr>

<h2>Usuários Inativos</h2>
<ul>
    @foreach ($users as $user)
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
    @endforeach
</ul>

@endsection
