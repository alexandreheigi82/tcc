<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lunas Tour</title>
    @vite('resources/css/app.css')

    <style>
        body {
            background: linear-gradient(to right, #6cb3c3, #acd4e4);
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #26535e;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 2rem;
            background-color: #26535e;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header img {
            width: 160px;
            height: auto;
        }

        .nav-links a {
            margin: 0 1rem;
            color: #acd4e4;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-links a:hover {
            background-color: #547cac;
            color: white;
        }

        .user-info {
            background-color: #547cac;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            cursor: pointer;
            position: relative;
        }

        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
            min-width: 200px;
        }

        .dropdown a {
            display: block;
            padding: 0.5rem 1rem;
            color: #26535e;
            text-decoration: none;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .dropdown a:hover {
            background-color: #f1f1f1;
        }

        .dropdown a:last-child {
            border-bottom: none;
        }

        .sidebar {
            background-color: white;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .types-list li {
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            background-color: #acd4e4;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .types-list li:hover {
            background-color: #6cb3c3;
            color: white;
        }

        .content h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .destaques {
            margin-top: 1.5rem;
        }

        .destaques h2 {
            margin-bottom: 1rem;
        }

        .pacote-card {
            background-color: white;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin: 0.5rem 0;
        }

        .pacote-card:hover {
            transform: scale(1.02);
            transition: transform 0.3s;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Lunas Tour">
        </a>
        <nav class="nav-links">
            <a href="{{ route('clients.index') }}">Clientes</a>
            <a href="{{ route('packages.index') }}">Pacotes</a>
            <a href="{{ route('users.index') }}">Usuários</a>
            <a href="{{ route('sales.index') }}">Vendas</a>
        </nav>
        <div class="user-info" id="user-dropdown-toggle">
            Usuário: {{ Auth::user()->nome }}
            <div class="dropdown" id="user-dropdown">
                <a href="{{ route('users.edit', Auth::user()->id) }}">Alterar Login</a>
                <a href="{{ route('clients.create') }}">Cadastrar Cliente</a>
                <a href="{{ route('clients.index') }}">Lista de Clientes</a>
                <a href="{{ route('sales.create') }}">Efetuar Venda</a>
                <a href="{{ route('packages.create') }}">Criar Pacote de Turismo</a>
                <a href="{{ route('packages.index') }}">Ver Pacotes de Turismo</a>
                <a href="{{ route('packages.inactive') }}">Pacotes Inativos</a>
                <a href="{{ route('users.create') }}">Cadastrar Novo Usuário</a>
                <a href="{{ route('users.index') }}">Visualizar Usuários</a>
                <a href="{{ route('sales.index') }}">Visualizar Vendas</a>

                <!-- Botão de Logout estilizado como link -->
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="inline-block">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-[#547cac] hover:text-[#26535e] block py-2">
                        Logout
                    </a>
                </form>
            </div>
        </div>
        </div>
    </header>

    <!-- Layout -->
    <div class="flex flex-col md:flex-row p-6 space-y-6 md:space-y-0">
        <!-- Menu lateral -->
        <aside class="sidebar w-full md:w-1/4">
            <h3>Tipos de Passeios</h3>
            <ul class="types-list">
                <li><a href="{{ route('dashboard', ['tipo' => 'Todos']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Todos</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Tranquilo']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Tranquilo</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Urbano']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Urbano</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Religioso']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Religioso</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Ecoturismo']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Ecoturismo</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Internacional']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Internacional</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Gastronômico']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Gastronômico</a></li>
                <li><a href="{{ route('dashboard', ['tipo' => 'Esportivo']) }}" class="text-[#26535e] hover:bg-[#bed8e0] cursor-pointer rounded-md">Esportivo</a></li>
            </ul>
        </aside>


        <!-- Conteúdo -->
        <main class="content flex-1">
            <h2>Painel de Controle</h2>
            <p class="text-center">Gerencie clientes, pacotes e usuários.</p>

            <!-- Destaques -->
            <section class="destaques">
                <h2>Destaques</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($packages->isNotEmpty())
                    @foreach ($packages as $package)
                    <div class="pacote-card bg-white p-4 rounded-lg shadow-lg border border-[#6cb3c3]">
                        <h4 class="text-xl font-bold mb-2 text-[#26535e]">{{ $package->titulo }}</h4>
                        <p class="mb-2 text-[#26535e]">{{ $package->descricao }}</p>
                        <p class="mb-2 text-[#26535e]">Valor: {{ $package->valor }}</p>
                        <p class="mb-2 text-[#26535e]">Vagas: {{ $package->vagas }}</p>
                        @if ($package->imagem)
                        <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-2 w-full h-48 object-cover rounded">
                        @endif
                        <a href="{{ $package->link }}" class="text-[#547cac] hover:underline mb-2 block">Link: Fale conosco</a>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center col-span-3 text-[#26535e]">Nenhum pacote disponível.</p>
                    @endif
                </div>
            </section>
        </main>

    </div>

    <!-- Script para dropdown -->
    <script>
        document.getElementById('user-dropdown-toggle').addEventListener('click', function() {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>

</html>
