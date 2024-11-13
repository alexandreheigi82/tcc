<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&#.]/',
            'token' => 'required'
        ]);

        Log::info('Processando redefinição de senha', ['email' => $request->email]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                Log::info('Redefinindo senha para o usuário', ['user' => $user]);

                $user->forceFill([
                    'senha' => Hash::make($password)
                ])->save();

                Log::info('Senha redefinida com sucesso para o usuário', ['user' => $user]);
            }
        );

        Log::info('Status da redefinição de senha', ['status' => $status]);

        if ($status === Password::PASSWORD_RESET) {
            Log::info('Redefinição bem-sucedida, redirecionando para a página de login');
            return redirect()->route('login.form')->with('status', 'Sua senha foi redefinida com sucesso.');
        } else {
            Log::info('Redefinição falhou, retornando para a página de redefinição de senha');
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}
