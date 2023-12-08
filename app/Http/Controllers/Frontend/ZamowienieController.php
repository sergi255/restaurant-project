<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Koszyk;
use App\Models\Zamowienie;
use Illuminate\Http\Request;

class ZamowienieController extends Controller
{
  public function index()
  {
   $koszyki = Koszyk::get();
   $suma = Koszyk::get()->sum('cena');
   return view('zamowienia.index', compact('koszyki','suma'));
  }

  public function store(Request $request)
  {
   $koszyki = Koszyk::get();
   $suma = Koszyk::get()->sum('cena');
   $potrawy = Koszyk::all()->pluck('menu_nazwa')->toArray();
   $validated = $request->validate([
     'imie' => ['required'],
     'nazwisko' => ['required'],
     'email' => ['required', 'email'],
     'nr_telefonu' => ['required'],
     'adres' => ['required'],
 ]);
 $zamowienia = new Zamowienie();
 $zamowienia->fill($validated);
 $zamowienia->cena = $suma;
 $zamowienia->potrawy = implode(", ", $potrawy);;
 $zamowienia->save();

 Koszyk::truncate();
 return to_route('thankyouzam');
  }
}
