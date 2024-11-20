@extends('master')

@section('content')
<h2>Pacotes de Turismo</h2>
<a href="{{ route('packages.inactive') }}">Ver Pacotes Desativados</a>

<!-- Filtros de Categoria e Tipo -->
<form method="GET" action="{{ route('packages.index') }}">
    <div>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="">Todas</option>
            <option value="Passagens">Passagens</option>
            <option value="Hotéis">Hotéis</option>
            <option value="Pacotes">Pacotes</option>
            <option value="Cruzeiros">Cruzeiros</option>
        </select>
    </div>
    <div>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
            <option value="">Todos</option>
            <option value="Tranquilo">Tranquilo</option>
            <option value="Urbano">Urbano</option>
            <option value="Religioso">Religioso</option>
            <option value="Ecoturismo">Ecoturismo</option>
            <option value="Internacional">Internacional</option>
            <option value="Gastronômico">Gastronômico</option>
            <option value="Esportivo">Esportivo</option>
        </select>
    </div>
    <button type="submit">Filtrar</button>
</form>

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
