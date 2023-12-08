<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Rezerwacja;
use App\Models\Stolik;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RezerwacjaController extends Controller
{
    public function krokPierwszy(Request $request)
    {
        $rezerwacje = $request->session()->get('rezerwacje');
        return view('rezerwacje.krok-pierwszy', compact('rezerwacje'));
    }

    public function storeKrokPierwszy(Request $request)
    {
        $validated = $request->validate([
            'imie' => ['required'],
            'nazwisko' => ['required'],
            'email' => ['required', 'email'],
            'data_rezerwacji' => ['required', 'date', new DateBetween],
            'godzina_rezerwacji' => ['required', new TimeBetween],
            'numer_telefonu' => ['required'],
            'liczba_osob' => ['required'],
        ]);

        if (empty($request->session()->get('rezerwacje'))) {
            $reservation = new Rezerwacja();
            $reservation->fill($validated);
            $request->session()->put('rezerwacje', $reservation);
        } else {
            $reservation = $request->session()->get('rezerwacje');
            $reservation->fill($validated);
            $request->session()->put('rezerwacje', $reservation);
        }

        return to_route('rezerwacje.krok.drugi');
    }
    public function krokDrugi(Request $request)
    {
        $rezerwacje = $request->session()->get('rezerwacje');
        $res_table_ids = Rezerwacja::orderBy('data_rezerwacji')->get()->filter(function ($value) use ($rezerwacje) {
            return $value->data_rezerwacji == $rezerwacje->data_rezerwacji;
        })->pluck('stolik_id');
        $res_table_ids = Rezerwacja::orderBy('godzina_rezerwacji')->get()->filter(function ($value) use ($rezerwacje) {
            return $value->godzina_rezerwacji == $rezerwacje->godzina_rezerwacji;
        })->pluck('stolik_id');
        $stoliki = Stolik::where('status', TableStatus::Available)
            ->where('liczba_osob', '>=', $rezerwacje->liczba_osob)
            ->whereNotIn('id', $res_table_ids)->get();
        return view('rezerwacje.krok-drugi', compact('rezerwacje', 'stoliki'));
    }

    public function storeKrokDrugi(Request $request)
    {
        $validated = $request->validate([
            'stolik_id' => ['required']
        ]);
        $rezerwacje = $request->session()->get('rezerwacje');
        $rezerwacje->fill($validated);
        $rezerwacje->save();
        $request->session()->forget('rezerwacje');

        return to_route('thankyou');
    }
}
