<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opinia;
use App\Http\Requests\OpiniaStoreRequest;
class OpiniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $opinie = Opinia::all();
        return view('admin.opinie.index', compact('opinie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.opinie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpiniaStoreRequest $request)
    {
        //
        Opinia::create([
            'imie' => $request->imie,
            'email' => $request->email,
            'opinia' => $request->opinia,
        ]);

        return to_route('admin.opinie.index')->with('success','Pomyślnie utworzono opinie');
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
    public function edit(Opinia $opinie)
    {
        //
        return view('admin.opinie.edit', compact('opinie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinia $opinie)
    {
        //
        $request ->validate([
            'imie' => 'required',
            'email' => 'required',
            'opinia' => 'required'
        ]);

        $opinie->update([
            'imie' => $request->imie,
            'email' => $request->email,
            'opinia' => $request->opinia,
        ]);

        return to_route('admin.opinie.index')->with('success','Pomyślnie zaaktualizowano opinie');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinia $opinie)
    {
        //
        $opinie->delete();
        return to_route('admin.opinie.index')->with('success','Pomyślnie usunięto opinie');
    }
}
