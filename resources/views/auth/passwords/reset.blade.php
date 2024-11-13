@extends('master')

@section('content')
    <h2>Redefinir Senha</h2>
    <form action="{{ route('password.update') }}" method="POST" onsubmit="return validatePassword()">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Nova Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Redefinir Senha</button>
    </form>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            if (password !== confirmPassword) {
                alert("As senhas não coincidem. Por favor, tente novamente.");
                return false;
            }
            return true;
        }
    </script>
@endsection
