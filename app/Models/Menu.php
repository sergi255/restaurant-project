<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nazwa','cena','opis','zdjecie'];

    public function kategoria()
    {
        return $this->belongsToMany(Kategoria::class, 'kategoria_menu');
    }
    public function koszyk()
    {
        return $this->hasMany(Koszyk::class);
    }
}
