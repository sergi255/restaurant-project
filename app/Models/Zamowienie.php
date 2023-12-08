<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamowienie extends Model
{
    protected $fillable = [
        'imie',
        'nazwisko',
        'adres',
        'nr_telefonu',
        'email',
        'potrawy',
        'adres',
        'cena'
    ];

    public function koszyk()
    {
        return $this->hasMany(Koszyk::class);
    }
}
