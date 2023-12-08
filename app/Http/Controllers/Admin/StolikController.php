<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stolik;
use Illuminate\Http\Request;
use App\Http\Requests\StolikStoreRequest;

class StolikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stoliki = Stolik::all();
        return view('admin.stoliki.index', compact('stoliki'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stoliki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StolikStoreRequest $request)
    {
        //
        Stolik::create([
            'nazwa' => $request->nazwa,
            'liczba_osob' => $request->liczba_osob,
            'status' => $request->status,
            'lokalizacja' => $request->lokalizacja
        ]);

        return to_route('admin.stoliki.index')->with('success','Pomyślnie utworzono stolik');;
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
    public function edit(Stolik $stoliki)
    {
        return view('admin.stoliki.edit', compact('stoliki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StolikStoreRequest $request, Stolik $stoliki)
    {
        //
        $stoliki->update($request -> validated());

        return to_route('admin.stoliki.index')->with('success','Pomyślnie zaaktualizowano stolik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stolik $stoliki)
    {
        //
        $stoliki->delete();
        $stoliki->rezerwacja()->delete();
        return to_route('admin.stoliki.index')->with('success','Pomyślnie usunięto stolik');
    }
}
