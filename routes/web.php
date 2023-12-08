<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RezerwacjaController as UserRezerwacjaController;
use App\Http\Controllers\User\OpiniaController as UserOpiniaController;
use App\Http\Controllers\User\ZamowienieController as UserZamowienieController;
use App\Http\Controllers\Admin\KategoriaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OpiniaController;
use App\Http\Controllers\Admin\RezerwacjaController;
use App\Http\Controllers\Admin\StolikController;
use App\Http\Controllers\Admin\ZamowienieController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\OpiniaController as FrontendOpiniaController;
use App\Http\Controllers\Frontend\KoszykController as FrontendKoszykController;
use App\Http\Controllers\Frontend\ZamowienieController as FrontendZamowienieController;
use App\Http\Controllers\Frontend\Welcomecontroller;
use App\Http\Controllers\Frontend\RezerwacjaController as FrontendRezerwacjaController;
use App\Http\Controllers\Frontend\StolikController as FrontendStolikController;
use App\Http\Controllers\Frontend\KategoriaController as FrontendKategoriaController;



Route::get('/', [WelcomeController::class, 'index']);

Route::get('/kategorie', [FrontendKategoriaController::class, 'index'])->name('kategorie.index');
Route::get('/kategorie/{kategorie}', [FrontendKategoriaController::class, 'show'])->name('kategorie.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/koszyki', [FrontendKoszykController::class, 'index'])->name('koszyki.index');
Route::get('/zamowienia', [FrontendZamowienieController::class, 'index'])->name('zamowienia.index');
Route::post('/zamowienia', [FrontendZamowienieController::class, 'store'])->name('zamowienia.store');
Route::get('/koszyki/{menus}', [FrontendKoszykController::class, 'store'])->name('koszyki.store');
Route::get('/koszyks/{menus}', [FrontendKoszykController::class, 'destroy'])->name('koszyki.destroy');
Route::get('/opinie', [FrontendOpiniaController::class, 'index'])->name('opinie.index');
Route::get('/opinie/create', [FrontendOpiniaController::class, 'create'])->name('opinie.create');
Route::post('/opinie/create', [FrontendOpiniaController::class, 'store'])->name('opinie.store');
Route::get('/rezerwacje/krok-pierwszy', [FrontendRezerwacjaController::class, 'krokPierwszy'])->name('rezerwacje.krok.pierwszy');
Route::get('/rezerwacje/krok-drugi', [FrontendRezerwacjaController::class, 'krokDrugi'])->name('rezerwacje.krok.drugi');
Route::post('/rezerwacje/krok-pierwszy', [FrontendRezerwacjaController::class, 'storeKrokPierwszy'])->name('rezerwacje.store.krok.pierwszy');
Route::post('/rezerwacje/krok-drugi', [FrontendRezerwacjaController::class, 'storeKrokDrugi'])->name('rezerwacje.store.krok.drugi');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
Route::get('/thankyouzam', [WelcomeController::class, 'thankyouzam'])->name('thankyouzam');
Route::get('/thankyouop', [WelcomeController::class, 'thankyouop'])->name('thankyouop');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('admin/kategorie', KategoriaController::class);

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function()
{
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/kategorie',KategoriaController::class);
    Route::resource('/menus',MenuController::class);
    Route::resource('/zamowienia',ZamowienieController::class);
    Route::resource('/rezerwacje',RezerwacjaController::class);
    Route::resource('/stoliki',StolikController::class);
    Route::resource('/opinie',OpiniaController::class);
});

Route::middleware(['auth'])->name('user.')->prefix('user')->group(function()
{
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::resource('/rezerwacje',UserRezerwacjaController::class);
    Route::resource('/opinie',UserOpiniaController::class);
    Route::resource('/zamowienia',UserZamowienieController::class);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
