<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Stolik;
use App\Enums\TableLocation;
use App\Enums\TableStatus;

class Rezerwacja extends Model
{
    use HasFactory;
    protected $fillable = [
        'imie',
        'nazwisko',
        'email',
        'numer_telefonu',
        'data_rezerwacji',
        'godzina_rezerwacji',
        'stolik_id',
        'liczba_osob'
    ];


    public function stolik()
    {
        return $this->belongsTo(Stolik::class);
    }
}
