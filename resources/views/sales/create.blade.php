@extends('master')

@section('content')
    <h2>Efetuar Venda</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div>
            <label for="client_id">Cliente:</label>
            <select name="client_id" id="client_id" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nome }} {{ $client->sobrenome }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="package_id">Pacote de Turismo:</label>
            <select name="package_id" id="package_id" required>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-valor="{{ $package->valor }}" data-descricao="{{ $package->descricao }}" data-vagas="{{ $package->vagas }}">
                        {{ $package->descricao }} - R$ {{ $package->valor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="1" value="1" required>
        </div>
        <div>
            <label for="vagas">Vagas Disponíveis:</label>
            <input type="text" id="vagas" readonly>
        </div>
        <button type="submit">Concluir</button>
        <button type="button" onclick="window.location.href='{{ route('dashboard') }}'">Cancelar</button>
    </form>

    <script>
        document.getElementById('package_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const vagas = selectedOption.getAttribute('data-vagas');
            document.getElementById('vagas').value = vagas;
        });
    </script>
@endsection
