<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Koszyk;
use App\Models\Kategoria;
use App\Http\Controllers\Frontend\KategoriaController;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::get()->sortBy('kategoria');
        $kategorie = Kategoria::all();
        return view('menus.index', compact('menus', 'kategorie'));
    }


}
