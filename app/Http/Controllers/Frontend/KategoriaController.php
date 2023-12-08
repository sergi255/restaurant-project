<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategoria;
use App\Models\Menu;
use Illuminate\Http\Request;

class KategoriaController extends Controller
{
    //
    public function index()
    {
        $kategorie = Kategoria::get();
        return view('kategorie.index', compact('kategorie'));
    }

    public function show(Kategoria $kategorie)
    {
        return view('kategorie.show', compact('kategorie'));
    }
}
