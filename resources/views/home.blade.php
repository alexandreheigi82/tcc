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
            Vendedor(a): {{ Auth::user()->nome }}
            <div class="dropdown" id="user-dropdown">
                <a href="{{ route('users.edit', Auth::user()->id) }}">Alterar Login</a>
                <a href="{{ route('clients.create') }}">Cadastrar Cliente</a>
                <a href="{{ route('clients.index') }}">Lista de Clientes</a>
                <a href="{{ route('sales.create') }}">Efetuar Venda</a>
                <a href="{{ route('packages.create') }}">Criar Pacote de Turismo</a>
                <a href="{{ route('packages.index') }}">Ver Pacotes de Turismo</a>
                <a href="{{ route('users.create') }}">Cadastrar Novo Usuário</a>
                <a href="{{ route('users.index') }}">Visualizar Usuários</a>
                <a href="{{ route('sales.index') }}">Visualizar Vendas</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </header>

    <!-- Layout -->
    <div class="flex flex-col md:flex-row p-6 space-y-6 md:space-y-0">
        <!-- Menu lateral -->
        <aside class="sidebar w-full md:w-1/4">
            <h3>Tipos de Passeios</h3>
            <ul class="types-list">
                <li>Tranquilo</li>
                <li>Urbano</li>
                <li>Religioso</li>
                <li>Ecoturismo</li>
                <li>Internacional</li>
                <li>Gastronômico</li>
                <li>Esportivo</li>
            </ul>
        </aside>

        <!-- Conteúdo -->
        <main class="content flex-1">
            <h2>Painel de Controle</h2>
            <p class="text-center">Gerencie clientes, pacotes e usuários.</p>

            <!-- Destaques -->
            <section class="destaques">
                <h2>Destaques</h2>
                <div class="pacote-card">Pacote 1 - Detalhes...</div>
                <div class="pacote-card">Pacote 2 - Detalhes...</div>
                <div class="pacote-card">Pacote 3 - Detalhes...</div>
            </section>
        </main>
    </div>

    <!-- Script para dropdown -->
    <script>
        document.getElementById('user-dropdown-toggle').addEventListener('click', function () {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>
</html>
