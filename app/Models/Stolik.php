<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TableLocation;
use App\Enums\TableStatus;
use App\Models\Rezerwacja;


class Stolik extends Model
{
    use HasFactory;
    protected $fillable = ['nazwa', 'liczba_osob', 'status', 'lokalizacja'];

    protected $casts = 
    [
        'status' => TableStatus::class,
        'lokalizacja' => TableLocation::class
    ];

    public function rezerwacja()
    {
        return $this->hasMany(Rezerwacja::class);
    }
}
