<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:clients,email',
            'cpf' => ['required', new \App\Rules\Cpf],
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'data_nascimento' => 'required|date',
            'cep' => 'required|string|max:9',
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }
}

