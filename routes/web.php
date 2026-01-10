<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\AnimalCreate;
use App\Livewire\AnimalEdit;
use App\Livewire\SolicitudesList;
use App\Livewire\SolicitudCreate;
use App\Livewire\Dashboard;




Route::get('/', function () {
    return view('home');
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
->name('solicitudes.create');

//

Route::get('/solicitudes', SolicitudesList::class)
->name('solicitudes.index')
->middleware(['auth','admin']);

    Route::get('/dashboard', Dashboard::class)
->name('dashboard');



Route::get('/login', function () {
    return 'Página pendiente';
})->name('login');


/*Ruta temporal para probar admin
use Illuminate\Support\Facades\Auth;
Use App\Models\User;

Route::get('/login-admin', function (){
    $admin = User::where('role','admin')->firstOrFail();
    Auth::login($admin);
    return redirect('/animales');
});*/

/*ruta para cerrar sesion admin
use Illuminate\Support\Facades\Auth;
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/animales');
});*/