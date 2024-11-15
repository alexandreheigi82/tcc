@extends('master')

@section('content')
    <h2>Pacotes de Turismo sss</h2>
   <a href="{{ route('packages.inactive') }}">Ver Pacotes Desativados</a> <!-- Link adicionado aqui -->

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
                <form action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pacote?')">Excluir</button>
                </form>
            </div>
        @endforeach
    @else
        <p>Nenhum pacote disponível.</p>
    @endif
@endsection
