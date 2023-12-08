<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use App\Http\Requests\RezerwacjaStoreRequest;
use App\Http\Requests\StolikStoreRequest;
use App\Models\Rezerwacja;
use App\Models\Stolik;
use App\Models\User;
use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RezerwacjaController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $rezerwacje = Rezerwacja::where('email', $user->email)->get();
        return view('user.rezerwacje.index', compact('rezerwacje'));
    }

    public function edit(Rezerwacja $rezerwacje)
    {
        $stoliki = Stolik::where('status', TableStatus::Available)->get();
        return view('user.rezerwacje.edit', compact('rezerwacje','stoliki'));
    }

    public function update(RezerwacjaStoreRequest $request, Rezerwacja $rezerwacje)
    {
        $stolik = Stolik::findOrFail($request->stolik_id);
        if($request->liczba_osob > $stolik->liczba_osob)
        {
            return back()->with('warning','Wybierz stolik dla większej liczby osób');
        }
        foreach ($stolik->rezerwacja as $res) {
            if (($res->data_rezerwacji == $request->data_rezerwacji) && ($res->godzina_rezerwacji == $request->godzina_rezerwacji)) {
                return back()->with('warning', 'Ten stolik jest tego dnia zarezerwowany');
            }
        }

        $rezerwacje->update($request->validated());
        return to_route('user.rezerwacje.index')->with('success', 'Pomyślnie zaaktualizowano rezerwacje');
    }

    public function destroy(Rezerwacja $rezerwacje)
    {
        $rezerwacje->delete();
        return to_route('user.rezerwacje.index')->with('success', 'Pomyslnie usunieto rezerwacje');
    }

}
