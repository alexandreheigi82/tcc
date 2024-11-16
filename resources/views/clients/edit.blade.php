@extends('master')

@section('content')
    <h2>Editar Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $client->email }}" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="{{ $client->cpf }}" required>
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $client->nome }}" required>
        </div>
        <div>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" value="{{ $client->sobrenome }}" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $client->telefone }}" required>
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $client->data_nascimento }}" required>
        </div>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="{{ $client->cep }}" required>
        </div>
        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" value="{{ $client->logradouro }}" required>
        </div>
        <div>
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="{{ $client->numero }}" required>
        </div>
        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" value="{{ $client->complemento }}">
        </div>
        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="{{ $client->bairro }}" required>
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="{{ $client->cidade }}" required>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="{{ $client->estado }}" required>
        </div>
        <div>
            <label for="situacao">Ativo:</label>
            <input type="checkbox" id="situacao" name="situacao" value="1" {{ $client->situacao ? 'checked' : '' }}>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location='{{ route('clients.index') }}'">Voltar</button>
    </form>
@endsection
