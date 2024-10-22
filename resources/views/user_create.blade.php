@extends('master')

@section('content')

<h2>Criar Novo</h2>

@if (session()->has('message'))
{{ session()->get('message') }}
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="sobrenome" placeholder="Sobrenome">
    <input type="text" name="email" placeholder="e-mail">
    <input type="text" name="senha" placeholder="Senha">
    <button type="submit">Criar Novo</button>
</form>

@endsection
