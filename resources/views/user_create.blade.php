@extends('master')

@section('content')

<h2>Criar Novo Usuário</h2>

@if (session()->has('message'))
{{ session()->get('message') }}
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="sobrenome" placeholder="Sobrenome">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="senha" placeholder="Senha">
    <label>
        Ativo:
        <input type="checkbox" name="situacao" value="1" checked>
    </label>
    <button type="submit">Criar Novo</button>
</form>

@endsection
