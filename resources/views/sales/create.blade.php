@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen p-6 flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Efetuar Venda</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="client_search" class="block mb-2">Cliente:</label>
                <input type="text" id="client_search" name="client_search" placeholder="Digite o nome do cliente" required class="w-full p-2 rounded bg-gray-700 text-white">
                <input type="hidden" id="client_id" name="client_id" required>
                <div id="client_list" class="absolute bg-black text-white border-gray-300 rounded mt-2 w-full z-10 hidden max-h-40 overflow-y-auto">
                    <!-- Resultados da busca serão exibidos aqui -->
                </div>
            </div>
            <div class="mb-4">
                <label for="package_id" class="block mb-2">Pacote de Turismo:</label>
                <select name="package_id" id="package_id" required class="w-full p-2 rounded bg-gray-700 text-white">
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-valor="{{ $package->valor }}" data-descricao="{{ $package->descricao }}" data-vagas="{{ $package->vagas }}">
                        {{ $package->titulo }} - R$ {{ $package->valor }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantidade" class="block mb-2">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="1" value="1" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="vagas" class="block mb-2">Vagas Disponíveis:</label>
                <input type="text" id="vagas" readonly class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Concluir</button>
                <button type="button" onclick="window.location.href='{{ route('dashboard') }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Cancelar</button>
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

    document.getElementById('client_search').addEventListener('input', function() {
        const term = this.value;
        if (term.length > 2) {
            fetch(`/clients/search?term=${term}`)
                .then(response => response.json())
                .then(data => {
                    let clientList = document.getElementById('client_list');
                    clientList.innerHTML = '';
                    data.forEach(client => {
                        let div = document.createElement('div');
                        div.textContent = `${client.nome} ${client.sobrenome}`;
                        div.style.padding = '8px';
                        div.style.cursor = 'pointer';
                        div.classList.add('hover:bg-gray-200');
                        div.addEventListener('click', function() {
                            document.getElementById('client_search').value = `${client.nome} ${client.sobrenome}`;
                            document.getElementById('client_id').value = client.id;
                            clientList.style.display = 'none';
                        });
                        clientList.appendChild(div);
                    });
                    clientList.style.display = 'block';
                });
        } else {
            document.getElementById('client_list').style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('#client_search') && !event.target.closest('#client_list')) {
            document.getElementById('client_list').style.display = 'none';
        }
    });
</script>
@endsection
