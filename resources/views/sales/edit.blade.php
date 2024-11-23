@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Editar Venda #{{ $sale->id }}</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
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
            <div class="mb-4">
                <label for="client_id" class="block mb-2">Cliente:</label>
                <select name="client_id" id="client_id" required class="w-full p-2 rounded bg-gray-700 text-white">
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $sale->client_id ? 'selected' : '' }}>
                        {{ $client->nome }} {{ $client->sobrenome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="package_id" class="block mb-2">Pacote de Turismo:</label>
                <select name="package_id" id="package_id" required class="w-full p-2 rounded bg-gray-700 text-white">
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-valor="{{ $package->valor }}" data-descricao="{{ $package->descricao }}" data-vagas="{{ $package->vagas }}" {{ $package->id == $sale->package_id ? 'selected' : '' }}>
                        {{ $package->titulo }} - R$ {{ $package->valor }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantidade" class="block mb-2">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="1" value="{{ $sale->quantidade }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Salvar</button>
                <button type="button" onclick="window.location.href='{{ route('sales.show', $sale->id) }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Cancelar</button>
            </div>
        </form>
    </div>
</div>

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
