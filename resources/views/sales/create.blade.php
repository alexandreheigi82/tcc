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
            <label for="client_search">Cliente:</label>
            <input type="text" id="client_search" name="client_search" placeholder="Digite o nome do cliente" required>
            <input type="hidden" id="client_id" name="client_id" required>
            <div id="client_list" style="position: absolute; background-color: #fff; border: 1px solid #ddd; display: none;">
                <!-- Resultados da busca serão exibidos aqui -->
            </div>
        </div>
        <div>
            <label for="package_id">Pacote de Turismo:</label>
            <select name="package_id" id="package_id" required>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-valor="{{ $package->valor }}" data-descricao="{{ $package->descricao }}" data-vagas="{{ $package->vagas }}">
                        {{ $package->titulo }} - R$ {{ $package->valor }}
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
