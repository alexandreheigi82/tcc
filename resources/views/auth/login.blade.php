<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login - Lunas Tour</title>
    @vite('resources/css/app.css')

    <!-- Link para o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #7bc6c9, #a8e6cf);
        }

        .container {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        input:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .button-enter:hover {
            background-color: #3e8e33;
        }

        .error-message {
            color: red;
            margin-top: 0.5rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body class="font-sans flex justify-center items-center h-screen m-2">
    <!-- Contêiner azul -->
    <div class="bg-[#7bc6c9] p-6 rounded-lg shadow-lg w-full max-w-md mx-auto">
        <div class="container text-center bg-white p-5 rounded-md w-full">
            <!-- Logo -->
            <div class="w-32 h-32 mx-auto mb-6 rounded-full border-4 border-blue-500 overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover transform scale-125" />
            </div>

            <!-- Título -->
            <h2 class="text-3xl font-bold text-black mb-6">Login</h2>

            <!-- Exibir mensagem de erro de autenticação -->
            @if ($errors->has('email') || $errors->has('password'))
                <div class="alert alert-danger mb-4 text-red-500">
                    <ul>
                        <li>Usuário ou senha incorretos</li>
                    </ul>
                </div>
            @endif

            <!-- Formulário de login -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" class="text-left">
                @csrf
                <div class="mb-5">
                    <label for="email" class="font-bold text-[#333]">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required class="w-full p-3 mt-2 border border-gray-300 rounded-md text-lg shadow-sm" />
                </div>
                <div class="mb-5">
                    <label for="password" class="font-bold text-[#333]">Senha:</label>
                    <div class="relative input-container">
                        <input type="password" id="password" name="password" placeholder="Digite sua senha" required class="w-full p-3 mt-2 pr-10 border border-gray-300 rounded-md text-lg shadow-sm" />
                        <i id="togglePassword" class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer opacity-60" onclick="togglePassword()"></i>
                    </div>
                </div>
                <div class="remember-me flex items-center mb-4 text-sm text-[#333]">
                    <input type="checkbox" id="remember" name="remember" class="mr-2" />
                    <label for="remember">Lembrar-me</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password text-blue-500 hover:underline text-sm">Esqueci minha senha</a>
                <div class="button-container flex justify-center mt-5">
                    <button type="submit" class="button-enter bg-[#2f9e44] px-5 py-2 rounded-md text-white font-semibold transition-colors duration-200">Entrar</button>
                </div>
            </form>

            <!-- Links para Política de Privacidade e Termos de Uso -->
            <div class="mt-5 text-sm text-gray-600">
                <a href="/privacy-policy" class="hover:underline">Política de Privacidade</a> |
                <a href="/terms-of-service" class="hover:underline">Termos de Uso</a>
            </div>
        </div>
    </div>

    <!-- Script para alternar a visibilidade da senha -->
    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("togglePassword");

            // Verifique se o ícone de olho existe
            if (passwordField.type === "password") {
                passwordField.type = "text";  // Torna o campo visível
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");  // Troca o ícone para 'eye-slash'
            } else {
                passwordField.type = "password";  // Torna o campo oculto
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");  // Troca o ícone para 'eye'
            }
        }
    </script>

</body>
</html>
