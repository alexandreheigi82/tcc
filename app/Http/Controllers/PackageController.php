<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();

        // Filtros de Categoria e Tipo
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria', $request->categoria);
        }
        if ($request->has('tipo') && $request->tipo != '') {
            $query->where('tipo', $request->tipo);
        }

        $packages = $query->where('situacao', true)->get(); // Apenas pacotes ativos
        return view('packages.index', ['packages' => $packages]);
    }



    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        Log::info('Entrou no método store do PackageController');
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'vagas' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'categoria' => 'required|string',
            'tipo' => 'required|string',
            'situacao' => 'boolean',
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
        $package->categoria = $request->input('categoria');
        $package->tipo = $request->input('tipo');
        $package->situacao = $request->has('situacao') ? true : false;

        $package->save();

        return redirect()->route('home')->with('message', 'Pacote criado com sucesso!');
    }




    public function show($id)
    {
        $package = Package::withTrashed()->findOrFail($id);
        return view('packages.show', ['package' => $package]);
    }


    public function edit(Package $package)
    {
        return view('packages.edit', ['package' => $package]);
    }

    public function update(Request $request, Package $package)
    {
        Log::info('Iniciando atualização do pacote');
        Log::info('Valor de situacao recebido: ' . $request->input('situacao'));

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'vagas' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'categoria' => 'required|string',
            'tipo' => 'required|string',
            'situacao' => 'nullable|string',
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
        $package->categoria = $request->input('categoria');
        $package->tipo = $request->input('tipo');
        $package->situacao = $request->input('situacao') === 'on' ? true : false;

        Log::info('Valor de situacao após processamento: ' . $package->situacao);

        $package->save();

        return redirect()->route('packages.show', ['package' => $package->id])->with('message', 'Pacote atualizado com sucesso!');
    }


    public function destroy(Package $package)
    {
        $package->situacao = false;
        $package->save();

        return redirect()->route('packages.index')->with('message', 'Pacote excluído com sucesso!');
    }

    public function inactive()
    {
        $packages = Package::where('situacao', 0)->get(); // Apenas pacotes inativos
        return view('packages.inactive', ['packages' => $packages]);
    }
}
