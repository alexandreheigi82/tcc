<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('home', compact('packages'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
