@extends('master')

@section('content')
    <div class="bg-[#6cb3c3] min-h-screen p-4 sm:p-6 lg:p-8">
        <!-- Cabeçalho -->
        <header class="header flex flex-wrap justify-between items-center p-4 bg-[#26535e] text-white shadow-lg rounded-lg mb-6">
            <nav class="flex items-center">
                <!-- Logo com link para Home -->
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Lunas Tour" class="w-40 h-auto mb-4 sm:mb-0">
                </a>
            </nav>
            <nav class="nav-links flex space-x-4 sm:space-x-6">
                <a href="{{ route('clients.index') }}" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Clientes</a>
                <a href="{{ route('packages.index') }}" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Pacotes</a>
                <a href="{{ route('users.index') }}" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Usuários</a>
                <a href="{{ route('sales.index') }}" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Vendas</a>
            </nav>
            <div class="user-info bg-[#547cac] text-white py-2 px-4 rounded cursor-pointer relative" id="user-dropdown-toggle">
                Vendedor(a): {{ Auth::user()->nome }}
                <div class="dropdown hidden absolute bg-white text-[#26535e] shadow-lg rounded mt-2 right-0 z-10" id="user-dropdown">
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="block py-2 px-4 hover:bg-[#f0f0f0]">Alterar Login</a>
                    <a href="{{ route('clients.create') }}" class="block py-2 px-4 hover:bg-[#f0f0f0]">Cadastrar Cliente</a>
                    <a href="{{ route('clients.index') }}" class="block py-2 px-4 hover:bg-[#f0f0f0]">Lista de Clientes</a>
                    <a href="{{ route('sales.create') }}" class="block py-2 px-4 hover:bg-[#f0f0f0]">Efetuar Venda</a>
                    <a href="{{ route('logout') }}" class="block py-2 px-4 hover:bg-[#f0f0f0]">Logout</a>
                </div>
            </div>
        </header>

        <!-- Container Principal -->
        <div class="flex flex-col md:flex-row space-y-6 md:space-y-0">
            <!-- Barra Lateral -->
            <aside class="sidebar w-full md:w-1/4 bg-white p-6 shadow-lg rounded-lg mb-6 md:mb-0">
                <h3 class="text-[#26535e] font-semibold text-xl mb-4">Tipos de Passeios</h3>
                <ul class="types-list space-y-2">
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Tranquilo</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Urbano</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Religioso</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Ecoturismo</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Internacional</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Gastronômico</li>
                    <li class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer">Esportivo</li>
                </ul>
            </aside>

            <!-- Área de Conteúdo -->
            <main class="content flex-1 bg-white p-6 shadow-lg rounded-lg">

                <li><a href="{{ route('dashboard') }}" class="text-2xl font-bold text-center text-[#26535e] mb-6">Painel de Controle</a></li>

                @if (Auth::check())
                    <h3 class="text-xl text-center text-[#26535e] mb-4">Bem-vindo, {{ Auth::user()->nome }}!</h3>
                @endif

                <p class="text-center text-[#26535e] mb-8">Aqui você pode gerenciar clientes, pacotes de turismo e usuários.</p>

                <!-- Sessão de Clientes -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-center text-[#26535e] mb-4">Clientes</h3>
                    <div class="text-center space-y-4">
                        <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-400 mx-2 my-2">Cadastrar Novo Cliente</a>
                        <a href="{{ route('clients.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-500 mx-2 my-2">Visualizar Clientes</a>
                    </div>
                </div>

                <!-- Sessão de Pacotes de Turismo -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-center text-[#26535e] mb-4">Pacotes de Turismo</h3>
                    <div class="text-center space-y-4">
                        <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-400 mx-2 my-2">Criar Pacote de Turismo</a>
                        <a href="{{ route('packages.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-500 mx-2 my-2">Ver Pacotes de Turismo</a>
                    </div>
                </div>

                <!-- Sessão de Usuários -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-center text-[#26535e] mb-4">Usuários</h3>
                    <div class="text-center space-y-4">
                        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-400 mx-2 my-2">Cadastrar Novo Usuário</a>
                        <a href="{{ route('users.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-500 mx-2 my-2">Visualizar Usuários</a>
                    </div>
                </div>

                <!-- Sessão de Vendas -->
                <div>
                    <h3 class="text-xl font-bold text-center text-[#26535e] mb-4">Vendas</h3>
                    <div class="text-center space-y-4">
                        <a href="{{ route('sales.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-400 mx-2 my-2">Efetuar Venda</a>
                        <a href="{{ route('sales.index') }}" target="_blank" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-500 mx-2 my-2">Visualizar Vendas</a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Script para alternar visibilidade do dropdown -->
    <script>
        document.getElementById('user-dropdown-toggle').addEventListener('click', function () {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>
@endsection
