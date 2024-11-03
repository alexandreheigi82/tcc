@extends('master')

@section('content')
    @if (Auth::check())
        <h2>Bem-vindo, {{ Auth::user()->nome }}</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="{{ route('packages.create') }}">Criar Pacote de Turismo</a>
        <a href="{{ route('packages.index') }}">Ver Pacotes de Turismo</a>
        <a href="{{ route('clients.create') }}">Cadastrar Novo Cliente</a>
    @else
        <h2>Bem-vindo, visitante</h2>
        <a href="{{ route('login.form') }}">Login</a>
    @endif
@endsection
