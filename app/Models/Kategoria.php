<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    use HasFactory;

    protected $fillable = ['nazwa', 'zdjecie', 'opis'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'kategoria_menu');
    }
}
