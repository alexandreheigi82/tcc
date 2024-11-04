@extends('master')

@section('content')
    <h2>Cadastrar Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" required>
        </div>
        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" required>
        </div>
        <div>
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" required>
        </div>
        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento">
        </div>
        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('home') }}'">Voltar</button>
    </form>

    <script>
        document.getElementById('cep').addEventListener('blur', function() {
            const cep = this.value.replace(/\D/g, '');
            if (cep) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!('erro' in data)) {
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('complemento').value = data.complemento;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(error => {
                        alert('Erro ao buscar o CEP. Tente novamente.');
                    });
            }
        });
    </script>
@endsection
