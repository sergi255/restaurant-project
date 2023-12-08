<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RezerwacjaStoreRequest;
use App\Http\Requests\StolikStoreRequest;
use App\Models\Rezerwacja;
use App\Models\Stolik;
use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RezerwacjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rezerwacje = Rezerwacja::all();
        return view('admin.rezerwacje.index', compact('rezerwacje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stoliki = Stolik::where('status', TableStatus::Available)->get();
        return view('admin.rezerwacje.create', compact('stoliki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RezerwacjaStoreRequest $request)
    {
        //
        
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
        Rezerwacja::create($request -> validated());
        
        return to_route('admin.rezerwacje.index')->with('success','Pomyślnie utworzono rezerwację');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rezerwacja $rezerwacje)
    {
        $stoliki = Stolik::where('status', TableStatus::Available)->get();
        return view('admin.rezerwacje.edit', compact('rezerwacje','stoliki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return to_route('admin.rezerwacje.index')->with('success', 'Pomyślnie zaaktualizowano rezerwacje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezerwacja $rezerwacje)
    {
        $rezerwacje->delete();

        return to_route('admin.rezerwacje.index')->with('success', 'Pomyslnie usunieto rezerwacje');
    }
}