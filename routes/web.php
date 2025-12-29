<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\AnimalCreate;
use App\Livewire\AnimalEdit;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animales/create', AnimalCreate::class)->name('animales.create');
Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');
Route::get('/animales/{animal}', [AnimalController::class, 'show'])->whereNumber('animal')->name('animales.show');
Route ::get('/animales/{animal}/edit', AnimalEdit::class)->whereNumber('animal')->name('animales.edit');
