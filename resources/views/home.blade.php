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

        <h2>Pacotes Disponíveis</h2>
        @if ($packages->isNotEmpty())
            @foreach ($packages as $package)
                @if ($package->situacao)
                    <div>
                        <h3>{{ $package->titulo }}</h3>
                        <p>{{ $package->descricao }}</p>
                        <p>Valor: {{ $package->valor }}</p>
                        <p>Vagas: {{ $package->vagas }}</p>
                        @if ($package->imagem)
                            <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" width="200">
                        @endif
                        <a href="{{ $package->link }}">Link: Fale conosco </a>
                        <br>
                        <a href="{{ route('packages.show', ['package' => $package->id]) }}">Detalhes</a>
                        <a href="{{ route('packages.edit', ['package' => $package->id]) }}">Editar</a>
                        <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')">Excluir</button>
                        </form>
                    </div>
                @endif
            @endforeach
        @else
            <p>Nenhum pacote disponível.</p>
        @endif

    @else
        <h2>Bem-vindo, visitante</h2>
        <a href="{{ route('login.form') }}">Login</a>
    @endif
@endsection
