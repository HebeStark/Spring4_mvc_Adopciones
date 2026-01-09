<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\AnimalCreate;
use App\Livewire\AnimalEdit;
use App\Livewire\SolicitudesList;
use App\Livewire\SolicitudCreate;
use App\Livewire\Dashboard;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');

Route::get('/animales/create', AnimalCreate::class)->name('animales.create');

Route::get('/animales/{animal}', [AnimalController::class, 'show'])
->whereNumber('animal')
->name('animales.show');

Route::get('/animales/{animal}/edit', AnimalEdit::class)
->whereNumber('animal')
->name('animales.edit');

//
Route::get('/solicitudes/crear', SolicitudCreate::class)
->name('sollicitudes.create');
//
Route::middleware('admin')->group(function () {
    Route::get('/solicitudes', SolicitudesList::class)
    ->name('sollicitudes.index');

    Route::get('/dashboard', Dashboard::class)
->name('dashboard');

});

Route::get('/login', function () {
    return 'Página pendiente';
})->name('login');


