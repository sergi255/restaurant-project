<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opinia;

class OpiniaController extends Controller
{
    //
    public function index()
    {
        $opinie = Opinia::get();
        return view('opinie.index', compact('opinie'));
    }

    public function create()
    {
        return view('opinie.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'imie' => ['required'],
            'email' => ['required', 'email'],
            'opinia' => ['required'],
        ]);
        $opinie = new Opinia();
        $opinie->fill($validated);
        $opinie->save();
        return to_route('thankyouop');
    }


}
