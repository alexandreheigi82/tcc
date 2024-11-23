@extends('master')

@section('content')
<div class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4 text-blue-400">Cadastrar Cliente</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="cpf" class="block mb-2">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="nome" class="block mb-2">Nome:</label>
                <input type="text" id="nome" name="nome" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="sobrenome" class="block mb-2">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="telefone" class="block mb-2">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="data_nascimento" class="block mb-2">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="cep" class="block mb-2">CEP:</label>
                <input type="text" id="cep" name="cep" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="logradouro" class="block mb-2">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="numero" class="block mb-2">Número:</label>
                <input type="text" id="numero" name="numero" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="complemento" class="block mb-2">Complemento:</label>
                <input type="text" id="complemento" name="complemento" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="bairro" class="block mb-2">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="cidade" class="block mb-2">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="estado" class="block mb-2">Estado:</label>
                <input type="text" id="estado" name="estado" required class="w-full p-2 rounded bg-gray-700 text-white">
            </div>
            <div class="mb-4">
                <label for="situacao" class="block mb-2">Ativo:</label>
                <input type="checkbox" id="situacao" name="situacao" value="1" checked class="bg-gray-700 text-blue-400">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-400">Salvar</button>
                <button type="button" onclick="window.location='{{ route('home') }}'" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500">Voltar</button>
            </div>
        </form>
    </div>
</div>

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
