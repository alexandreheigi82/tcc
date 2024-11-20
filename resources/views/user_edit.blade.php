@extends('master')

@section('content')

<h2>Editar Usuário</h2>

@if (session()->has('message'))
{{ session()->get('message') }}
@endif

<form action="{{ route('users.update',['user'=>$user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="nome" value="{{ $user->nome }}">
    <input type="text" name="sobrenome" value="{{ $user->sobrenome }}">
    <input type="email" name="email" value="{{ $user->email }}">
    <input type="password" name="senha" placeholder="Nova Senha (opcional)">
    <label>
        Ativo:
        <input type="checkbox" name="situacao" value="1" {{ $user->situacao ? 'checked' : '' }}>
    </label>
    <button type="submit">Atualizar</button>
</form>

@endsection
