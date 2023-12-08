<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriaStoreRequest;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Storage;

class KategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorie = Kategoria::all();
        return view('admin.kategorie.index', compact('kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriaStoreRequest $request)
    {
        //
        $zdjecie = $request->file('zdjecie')->store('/public/kategorie');

        Kategoria::create([
            'nazwa' => $request->nazwa,
            'opis'=> $request->opis,
            'zdjecie' =>$zdjecie
        ]);

        return to_route('admin.kategorie.index')->with('success','Pomyślnie utworzono kategorię');
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
    public function edit(Kategoria $kategorie)
    {
        return view('admin.kategorie.edit', compact('kategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategoria $kategorie)
    {
        $request->validate([
            'nazwa' => 'required',
            'opis' => 'required'
        ]);
        $zdjecie = $kategorie->zdjecie;
        if ($request->hasFile('zdjecie')) {
            Storage::delete($kategorie->zdjecie);
            $zdjecie = $request->file('zdjecie')->store('public/kategorie');
        }

        $kategorie->update([
            'nazwa' => $request->nazwa,
            'opis' => $request->opis,
            'zdjecie' => $zdjecie
        ]);
        return to_route('admin.kategorie.index')->with('success', 'Pomyślnie zaaktualizowano kategorię');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoria $kategorie)
    {
        Storage::delete($kategorie->zdjecie);
        $kategorie->menus()->delete();
        $kategorie->delete();

        return to_route('admin.kategorie.index')->with('success','Pomyślnie usunięto kategorię');
    }
}
