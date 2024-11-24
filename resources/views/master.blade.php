<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunas Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #06b6d4, #67e8f9); /* Cor equivalente a bg-gradient-to-r from-cyan-500 to-cyan-200 */
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
        }

    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="{{ route('home') }}"></a></li>
        <li><a href="{{ route('dashboard') }}"></a></li>
        @if (Auth::check())
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"></button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login.form') }}">Login</a></li>
        @endif
    </ul>
</nav>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Adicionar mensagens de feedback -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>
   <!-- Rodapé -->
   <footer class="bg-[#547cac] py-6 mt-8 text-white text-center">
    <div class="max-w-3xl mx-auto">
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

</body>
</html>
