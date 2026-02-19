<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\SolicitudesList;
use App\Livewire\SolicitudCreate;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Animal;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/animales', [AnimalController::class, 'index'])
    ->name('animales.index');

Route::get('/animales/{animal}', [AnimalController::class, 'show'])
    ->name('animales.show');  

    Route::get('/animales/{animal}/solicitar', function (Animal $animal) {
    return view('solicitudes.create', compact('animal'));
})->name('solicitudes.create');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request){
    $credentials = $request->only('email','password');
    
    if(Auth::attempt($credentials)){

        /**@var \App\Models\User $user */
        $user = Auth::user();

        if($user && $user->isAdmin()) {
            return redirect()->route('dashboard');
        }
        
        Auth::logout();
        return back()->withErrors(['email'=> 'Acceso solo administradores.']);
    }

    return back()->withErrors(['email'=> 'Credenciales incorrectas.']);
    })->name('login.post');

Route::post('/logout', function(){
    Auth::logout();
    return redirect()->route('home');
    })->name('logout');


Route::middleware(['auth', 'admin'])
->prefix('admin')
->group(function () {
    Route::get('/animales/create', [AnimalController::class, 'create'])
        ->name('animales.create');

        Route::post('/animales', [AnimalController::class, 'store'])
        ->name('animales.store');

        Route::get('/animales/{animal}/edit', [AnimalController::class, 'edit'])
        ->name('animales.edit');

        Route::put('/animales/{animal}', [AnimalController::class, 'update'])
        ->name('animales.update');

        Route::delete('/animales/{animal}', [AnimalController::class, 'destroy'])
        ->name('animales.destroy');

        Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

        Route::get('/solicitudes', SolicitudesList::class)
        ->name('solicitudes.index');

});


