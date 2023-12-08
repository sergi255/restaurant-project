<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Zamowienie;
use Illuminate\Http\Request;

class ZamowienieController extends Controller
{
    public function index()
    {
        //
        $user = \Auth::user();
        $zamowienia= Zamowienie::where('email', $user->email)->get();
        return view('user.zamowienia.index', compact('zamowienia'));
    }

    public function destroy(Zamowienie $zamowienia)
{ 
    $zamowienia->delete();
    return to_route('user.zamowienia.index')->with('success', 'Pomyslnie usunieto zamowienie');
 }
}
