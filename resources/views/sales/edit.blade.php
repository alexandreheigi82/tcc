@extends('master')

@section('content')
    <h2>Editar Venda #{{ $sale->id }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="client_id">Cliente:</label>
            <select name="client_id" id="client_id" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $sale->client_id ? 'selected' : '' }}>
                        {{ $client->nome }} {{ $client->sobrenome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="package_id">Pacote de Turismo:</label>
            <select name="package_id" id="package_id" required>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-valor="{{ $package->valor }}" data-descricao="{{ $package->descricao }}" data-vagas="{{ $package->vagas }}" {{ $package->id == $sale->package_id ? 'selected' : '' }}>
                        {{ $package->titulo }} - R$ {{ $package->valor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="1" value="{{ $sale->quantidade }}" required>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='{{ route('sales.show', $sale->id) }}'">Cancelar</button>
    </form>

    <script>
        document.getElementById('package_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const vagas = selectedOption.getAttribute('data-vagas');
            document.getElementById('vagas').value = vagas;
        });

        // Exibe as vagas disponíveis para o pacote selecionado
        const initialSelectedOption = document.getElementById('package_id').selectedOptions[0];
        document.getElementById('vagas').value = initialSelectedOption.getAttribute('data-vagas');
    </script>
@endsection
