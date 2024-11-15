@extends('master')

@section('content')
    <h2>Pacotes Desativados</h2>
    @if ($packages->isNotEmpty())
        @foreach ($packages as $package)
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

            </div>
        @endforeach
    @else
        <p>Nenhum pacote desativado disponível.</p>
    @endif
@endsection



