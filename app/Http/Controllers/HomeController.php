<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('home', compact('packages'));
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        $sales = Sale::with(['client', 'package', 'user'])->get();
        return view('dashboard', compact('sales'));
    }

}
