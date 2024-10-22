@extends('master')

@section('content')

<a href="{{ route('users.create') }}">Criar Novo</a>

<hr>

<h2>Users</h2>

<ul>
    @foreach ($users as $user)
    <li>{{ $user->nome }} | <a href="{{ route('users.edit',['user'=>$user->id]) }}">Editar</a> </li> |
    <a href="{{ route('users.show', ['user'=> $user->id]) }}">Visualizar</a>
    @endforeach
</ul>

@endsection
