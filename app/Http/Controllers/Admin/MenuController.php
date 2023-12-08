<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Menu;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorie = Kategoria::all();
        return view('admin.menus.create', compact('kategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $zdjecie = $request->file('zdjecie')->store('public/menus');

        $menu = Menu::create([
            'nazwa' => $request->nazwa,
            'opis'=> $request->opis,
            'zdjecie' => $zdjecie,
            'cena' => $request->cena
        ]);

        if($request->has('kategoria'))
        {
            $menu->kategoria()->attach($request->kategoria);
        }

        return to_route('admin.menus.index')->with('success','Pomyślnie utworzono menu');
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
    public function edit(Menu $menu)
    {
        //
        $kategorie = Kategoria::all();
        return view('admin.menus.edit', compact('menu','kategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        
        $request->validate([
            'nazwa' => 'required',
            'opis' => 'required',
            'cena' => 'required'
        ]);
        $zdjecie = $menu->zdjecie;
        if ($request->hasFile('zdjecie')) {
            Storage::delete($menu->zdjecie);
            $zdjecie = $request->file('zdjecie')->store('public/menus');
        }

        $menu->update([
            'nazwa' => $request->nazwa,
            'opis' => $request->opis,
            'cena' => $request->cena,
            'zdjecie' => $zdjecie
        ]);

        if($request->has('kategoria'))
        {
            $menu->kategoria()->sync($request->kategoria);
        }

        return to_route('admin.menus.index')->with('success','Pomyślnie zaaktualizowano menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->zdjecie);
        $menu->delete();

        return to_route('admin.menus.index')->with('success','Pomyślnie usunięto menu');
    }
}
