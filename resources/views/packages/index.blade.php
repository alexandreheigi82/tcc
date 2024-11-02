@extends('master')

@section('content')
    <h2>Pacotes de Turismo</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul>
        @foreach ($packages as $package)
            <li>
                <h3>{{ $package->titulo }}</h3>
                <p>{{ $package->descricao }}</p>
                <p>Valor: {{ $package->valor }}</p>
                <p>Vagas: {{ $package->vagas }}</p>
                @if ($package->imagem)
                    <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" width="200">
                @endif
                <br>
                <a href="{{ route('packages.show', ['package' => $package->id]) }}">Ver Detalhes</a>
            </li>
        @endforeach
    </ul>
@endsection
