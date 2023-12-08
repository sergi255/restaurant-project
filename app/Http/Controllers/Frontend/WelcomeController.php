<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategoria;
use App\Models\Opinia;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $zibi = Kategoria::where('nazwa', 'Dania kuchni tajskiej')->first();
        $opinie = Opinia::get()->take(3);
        return view('welcome', compact('zibi', 'opinie'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
    public function thankyouzam()
    {
        return view('thankyouzam');
    }
    public function thankyouop()
    {
        return view('thankyouop');
    }
}
