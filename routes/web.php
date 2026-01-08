<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\AnimalCreate;
use App\Livewire\AnimalEdit;
use App\Livewire\SolicitudesList;
use App\Livewire\SolicitudCreate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animales/create', AnimalCreate::class)->name('animales.create');
Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');
Route::get('/animales/{animal}', [AnimalController::class, 'show'])->whereNumber('animal')->name('animales.show');
Route::get('/animales/{animal}/edit', AnimalEdit::class)->whereNumber('animal')->name('animales.edit');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))
    ->name('dashboard');
    Route::get('solicitudes', fn() => view('solicitudes.index'))
    ->name('solicitudes.index');
});
Route::get('/login', function () {
    return 'Página pendiente';
})->name('login');
Route::get('/solicitudes', SolicitudesList::class)
->name('sollicitudes.index')
->middleware(['auth', 'admin']);
Route::get('/solicitudes/crear', SolicitudCreate::class)
->name('sollicitudes.create')
->middleware('auth');

//Ruta para prueba de login admin
Route::get('/login-admin', function () {
    $admin = User::where('role', 'admin')->first();
    if(!$admin){
        return'No existe usuario admin';
    }
    Auth::login($admin);
    return redirect('/solicitudes');
    });