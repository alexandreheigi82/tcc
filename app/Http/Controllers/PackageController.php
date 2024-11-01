<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', ['packages' => $packages]);
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
//teste de gravacao
        Log::info('Entrou no método store do PackageController');
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'vagas' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
        ]);

        $package = new Package();
        $package->titulo = $request->input('titulo');
        $package->descricao = $request->input('descricao');
        $package->valor = $request->input('valor');
        $package->vagas = $request->input('vagas');

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            $package->imagem = $path;
        }

        $package->save();

        return redirect()->route('home')->with('message', 'Pacote criado com sucesso!');
    }
}
