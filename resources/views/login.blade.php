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
            background: linear-gradient(to right, #7bc6c9, #a8e6cf); /* Gradiente suave */
            font-family: 'Arial', sans-serif;
        }

        .container {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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

        .button-back,
        .button-enter {
            transition: background-color 0.3s ease;
        }

        .button-back:hover {
            background-color: #6b7f7c;
        }

        .button-enter:hover {
            background-color: #3e8e33;
        }
    </style>
</head>
<body class="font-sans flex justify-center items-center h-screen m-2">
    <!-- Contêiner de login -->
    <div class="bg-[#6cb3c3] p-8 rounded-lg shadow-xl w-full max-w-md mx-auto">
        <div class="container text-center bg-white p-6 rounded-md w-full">
            <!-- Logo -->
            <div class="w-32 h-32 mx-auto mb-6 rounded-full border-4 border-[#26535e] overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover transform scale-125" />
            </div>

            <!-- Título -->
            <h2 class="text-3xl font-semibold text-[#26535e] mb-6">Login</h2>

            <!-- Exibir mensagens de erro -->
            <div id="errorContainer" class="alert alert-danger mb-4 text-red-500" style="display: none;">
                <ul id="errorList"></ul>
            </div>

            <!-- Formulário de login -->
            <form id="loginForm" class="text-left">
                @csrf
                <div class="mb-5">
                    <label for="email" class="font-bold text-[#333]">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required class="w-full p-3 mt-2 border border-[#dcdcdc] rounded-md text-lg shadow-sm focus:border-[#26535e]" />
                </div>
                <div class="mb-5">
                    <label for="password" class="font-bold text-[#333]">Senha:</label>
                    <div class="relative input-container">
                        <input type="password" id="password" name="password" placeholder="Digite sua senha" required class="w-full p-3 mt-2 pr-10 border border-[#dcdcdc] rounded-md text-lg shadow-sm focus:border-[#26535e]" />
                        <!-- Ícone de olho para alternar a visibilidade da senha -->
                        <i id="togglePassword" class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer opacity-60"></i>
                    </div>
                </div>
                <div class="remember-me flex items-center mb-4 text-sm text-[#333]">
                    <input type="checkbox" id="remember" name="remember" class="mr-2" />
                    <label for="remember">Lembrar-me</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password text-[#26535e] hover:underline text-sm">Esqueci minha senha</a>
                <div class="button-container flex justify-between mt-5">
                    <button type="button" onclick="window.history.back();" class="button-back bg-[#6b7f7c] px-5 py-2 rounded-md text-white font-semibold">Voltar</button>
                    <button type="submit" class="button-enter bg-[#2f9e44] px-5 py-2 rounded-md text-white font-semibold transition-colors duration-200">Entrar</button>
                </div>
            </form>

            <!-- Links para Política de Privacidade e Termos de Uso -->
            <div class="mt-5 text-sm text-[#333]">
                <a href="/privacy-policy" class="hover:underline">Política de Privacidade</a> |
                <a href="/terms-of-service" class="hover:underline">Termos de Uso</a>
            </div>
        </div>
    </div>

    <!-- Script para alternar a visibilidade da senha -->
    <script>
        // Função para alternar entre mostrar e ocultar senha
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("togglePassword");

            // Alterna entre texto e senha
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash"); // Ícone para "ocultar"
            } else {
                passwordField.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye"); // Ícone para "mostrar"
            }
        }

        // Adicionando o evento de clique para alternar o ícone
        document.getElementById("togglePassword").addEventListener("click", togglePassword);
    </script>
</body>
</html>
