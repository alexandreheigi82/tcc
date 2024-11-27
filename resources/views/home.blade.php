<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
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

<body>

    <div class="">
        <!-- Cabeçalho -->
        <header class="flex justify-between items-center p-4 bg-[#26535e] text-white shadow-lg mb-6"> <!-- retirado: text-white shadow-lg mb-6 -->
            <!-- Logo e Navegação Centralizada -->
            <div class="flex items-center space-x-8 w-full">
                <a href="{{ route('home') }}" class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Lunas Tour" class="w-40 h-auto">
                </a>

                <nav class="nav-links flex justify-center flex-grow space-x-4">
                    <a href="{{ route('home') }}" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Home</a>
                    <a href="#sobre" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Sobre</a>
                    <a href="#contatos" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Contatos</a>
                </nav>
            </div>
        </header>
    </div>

    <!-- Botão de Login 
                <div class="flex-shrink-0">
                    @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-[#547cac] text-white py-2 px-4 rounded hover:bg-[#26535e]">Login</button>
                    </form>
                    @else
                    <a href="{{ route('login.form') }}" class="bg-[#547cac] text-white py-2 px-4 rounded hover:bg-[#26535e]">Login</a>
                    @endif
                </div> -->
    </div>
    </header>

    <!-- Conteúdo Principal -->
    <div class="flex flex-col md:flex-row space-y-6 md:space-y-0">
        <aside class="w-full md:w-1/4 bg-white p-6 shadow-lg md:min-h-screen">
            <h3 class="text-[#26535e] font-semibold text-xl mb-4">Tipos de Passeios</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home', ['tipo' => 'Todos']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Todos</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Tranquilo']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Tranquilo</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Urbano']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Urbano</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Religioso']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Religioso</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Ecoturismo']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Ecoturismo</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Internacional']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Internacional</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Gastronômico']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Gastronômico</a></li>
                <li><a href="{{ route('home', ['tipo' => 'Esportivo']) }}" class="text-[#26535e] px-4 py-2 hover:bg-[#bed8e0] cursor-pointer rounded-md">Esportivo</a></li>
            </ul>
        </aside>

        <!-- Pacotes Disponíveis -->
        <main class="flex-1 bg-white p-6 shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6 text-[#26535e]">Bem-vindo ao Lunas Tour</h2>
            <section>
                <h3 class="text-2xl font-bold text-center mb-4 text-[#26535e]">Pacotes Disponíveis</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($packages->isNotEmpty())
                    @foreach ($packages as $package)
                    @if ($package->situacao)
                    <div class="pacote-card bg-white p-4 rounded-lg shadow-lg border border-[#6cb3c3]">
                        <h4 class="text-xl font-bold mb-2 text-[#26535e]">{{ $package->titulo }}</h4>
                        <p class="mb-2 text-[#26535e]">{{ $package->descricao }}</p>
                        <p class="mb-2 text-[#26535e]">Valor: R$ {{ number_format($package->valor, 2, ',', '.') }}</p>
                        <p class="mb-2 text-[#26535e]">Vagas: {{ $package->vagas }}</p>
                        @if ($package->imagem)
                        <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-2 w-full h-48 object-cover rounded">
                        @endif
                        <a href="{{ $package->link }}" class="text-[#547cac] hover:underline mb-2 block">Link: Fale conosco</a>
                        @if (Auth::check())

                        @endif
                    </div>
                    @endif
                    @endforeach
                    @else
                    <p class="text-center col-span-3 text-[#26535e]">Nenhum pacote disponível.</p>
                    @endif
                </div>
            </section>
        </main>
    </div>
    </div>


</body>
<footer class="bg-[#547cac] py-6 mt-8 text-white text-center">
    <!-- Seção de Contato -->
    <div class="ax-w-3xl mx-auto contatos">
        <h2 class="text-2xl font-bold mb-4">Entre em Contato</h2>
        <p>E-mail: contato@lunastour.com</p>
        <p>Telefone: (11) 1234-5678</p>
        <p>Endereço: Rua das Viagens, 123 - São Paulo, SP</p>
    </div>
    
    <!-- Seção Sobre -->
    <div class="ax-w-3xl mx-auto sobre">
        <h4 class="text-lg font-bold">Sobre a Lunas Tour</h4>
        <br>
        <p class="text-[#acd4e4]">Na Lunas Tour, transformamos viagens em experiências inesquecíveis.
            <br>
            Somos especialistas em criar roteiros personalizados que combinam conforto, aventura e momentos únicos.
            Com uma equipe apaixonada e dedicada, oferecemos pacotes de viagens que atendem a todos os estilos, sempre com o compromisso de superar expectativas.
        </p>
        <p class="text-[#acd4e4] mt-4">
            Descubra o mundo com quem entende de viagens. Na Lunas Tour, seu destino é a nossa inspiração!
        </p>
    </div>
</footer>

</html>