<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Importando Log
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    Log::info('Tentativa de login com o email:', ['email' => $request->email]);

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&#.]/'
    ]);

    $user = User::where('email', $request->email)->first();
    Log::info('Usuário encontrado:', ['user' => $user]);

    if ($user && Hash::check($request->password, $user->senha)) {  // Verificando 'senha' do DB
        Log::info('Senha correta, autenticando usuário');
        Auth::login($user);
        Log::info('Usuário autenticado, redirecionando para a home');
        return redirect()->route('home');
    }

    Log::warning('Credenciais não correspondem aos registros');
    throw ValidationException::withMessages([
        'email' => [trans('auth.failed')],
    ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }

    public function showResetForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('auth.user')]);
        }

        // Envio do email (simulação)
        Mail::raw('Clique aqui para redefinir sua senha: [link]', function ($message) use ($request) {
            $message->to($request->input('email'))
                    ->subject('Redefinição de senha');
        });

        return back()->with('status', trans('passwords.sent'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
            'token' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('auth.user')]);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('status', trans('passwords.reset'));
    }
}
