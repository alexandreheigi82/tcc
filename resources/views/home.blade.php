@extends('master')

@section('content')
<div class="bg-[#6cb3c3] min-h-screen p-4 sm:p-6 lg:p-8 text-gray-800">
    <!-- Cabeçalho -->
    <header class="flex justify-between items-center p-4 bg-[#26535e] text-white shadow-lg mb-6">
        <!-- Logo e Navegação Centralizada -->
        <div class="flex items-center space-x-8 w-full">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Lunas Tour" class="w-40 h-auto">
            </a>

            <!-- Navegação de Categorias Centralizada -->
            <nav class="nav-links flex justify-center flex-grow space-x-4">
                <a href="#" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Passagens</a>
                <a href="#" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Hotéis</a>
                <a href="#" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Pacotes</a>
                <a href="#" class="text-[#acd4e4] px-4 py-2 rounded hover:bg-[#547cac]">Cruzeiros</a>
            </nav>

            <!-- Botão de Login -->
            <div class="flex-shrink-0">
                @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-[#547cac] text-white py-2 px-4 rounded hover:bg-[#26535e]">Logout</button>
                </form>
                @else
                <a href="{{ route('login.form') }}" class="bg-[#547cac] text-white py-2 px-4 rounded hover:bg-[#26535e]">Login</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <div class="flex flex-col md:flex-row space-y-6 md:space-y-0">
        <!-- Filtro Lateral Conectado ao Header -->
        <aside class="w-full md:w-1/4 bg-white p-6 shadow-lg rounded-bl-lg rounded-tl-lg md:min-h-screen">
            <h3 class="text-[#26535e] font-semibold text-xl mb-4">Tipos de Passeios</h3>
            <ul class="space-y-2">
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
        <main class="flex-1 bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold text-center mb-6 text-[#26535e]">Bem-vindo ao Lunas Tour</h2>
            <section>
                <h3 class="text-2xl font-bold text-center mb-4 text-[#26535e]">Pacotes Disponíveis</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if ($packages->isNotEmpty())
                    @foreach ($packages as $package)
                    @if ($package->situacao)
                    <div class="bg-white p-4 rounded-lg shadow-lg border border-[#6cb3c3]">
                        <h4 class="text-xl font-bold mb-2 text-[#26535e]">{{ $package->titulo }}</h4>
                        <p class="mb-2 text-[#26535e]">{{ $package->descricao }}</p>
                        <p class="mb-2 text-[#26535e]">Valor: {{ $package->valor }}</p>
                        <p class="mb-2 text-[#26535e]">Vagas: {{ $package->vagas }}</p>
                        @if ($package->imagem)
                        <img src="{{ asset('storage/' . $package->imagem) }}" alt="{{ $package->titulo }}" class="mb-2 w-full h-48 object-cover rounded">
                        @endif
                        <a href="{{ $package->link }}" class="text-[#547cac] hover:underline mb-2 block">Link: Fale conosco</a>
                        @if (Auth::check())
                        <!-- Botão de Detalhes -->
                        <div class="flex space-x-2 mt-2">
                            <a href="{{ route('packages.show', ['package' => $package->id]) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400">Detalhes</a>
                        </div>
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
@endsection
