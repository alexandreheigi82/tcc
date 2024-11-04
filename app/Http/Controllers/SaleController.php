<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function create()
    {
        $clients = Client::all();
        $packages = Package::all();
        return view('sales.create', compact('clients', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'package_id' => 'required|exists:packages,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $package = Package::find($request->package_id);
        $quantidade_vagas_disponiveis = $package->vagas - $request->quantidade;

        if ($quantidade_vagas_disponiveis < 0) {
            return back()->withErrors(['quantidade' => 'Quantidade excede o número de vagas disponíveis']);
        }

        // Atualizar a quantidade de vagas disponíveis no pacote
        $package->update(['vagas' => $quantidade_vagas_disponiveis]);

        Sale::create([
            'client_id' => $request->client_id,
            'user_id' => Auth::id(), // Certifique-se de usar Auth::id()
            'package_id' => $request->package_id,
            'quantidade' => $request->quantidade,
        ]);

        return redirect()->route('dashboard')->with('success', 'Venda realizada com sucesso!');
    }

    public function show($id)
    {
        $sale = Sale::with(['client', 'package', 'user'])->findOrFail($id);
        return view('sales.show', compact('sale'));
    }
}

