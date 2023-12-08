<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Koszyk;
use Illuminate\Http\Request;

class KoszykController extends Controller
{
    //
     //
     public function index()
     {
      $koszyki = Koszyk::get();
      $suma = Koszyk::get()->sum('cena');
      return view('koszyki.index', compact('koszyki','suma'));
     }

     public function store(Menu $menus)
     {
      $koszyki = new Koszyk();
      $koszyki->menu_id = $menus->id;
      $koszyki->menu_nazwa = $menus->nazwa;
      $koszyki->cena = $menus->cena;
      $koszyki->save();
      return to_route('koszyki.index');
     }


     public function destroy(Koszyk $menus)
    {
      $menus->delete();
      return to_route('koszyki.index');
    }
 
}
