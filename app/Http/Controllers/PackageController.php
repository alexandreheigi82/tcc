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
            'link' => 'nullable|url'
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

        $package->link = $request->input('link');

        $package->save();

        return redirect()->route('home')->with('message', 'Pacote criado com sucesso!');
    }

    public function show(Package $package)
    {
        return view('packages.show', ['package' => $package]);
    }

    public function edit(Package $package)
    {
        return view('packages.edit', ['package' => $package]);
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'vagas' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $package->titulo = $request->input('titulo');
        $package->descricao = $request->input('descricao');
        $package->valor = $request->input('valor');
        $package->vagas = $request->input('vagas');

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            $package->imagem = $path;
        }

        $package->link = $request->input('link');

        $package->save();

        return redirect()->route('packages.show', ['package' => $package->id])->with('message', 'Pacote atualizado com sucesso!');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')->with('message', 'Pacote excluído com sucesso!');
    }



}
