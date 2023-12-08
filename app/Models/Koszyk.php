<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koszyk extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id','menu_nazwa','cena'];
    
    public function menus()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}
