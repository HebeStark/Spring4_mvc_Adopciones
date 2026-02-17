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


Route::resource('animales', AnimalController::class)
->parameters(['animales' => 'animal']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('animales', AnimalController::class)->except([
        'index', 'show']);
});

//
Route::get('/animales/{animal}/solicitar', function (Animal $animal) {
    return view('solicitudes.create', compact('animal'));
})->name('solicitudes.create');

 Route::get('/solicitudes/crear', SolicitudCreate::class)
    ->name('solicitudes.create');


//
Route::middleware(['auth', 'admin'])->group( function () {
    Route::get('/solicitudes', SolicitudesList::class)
            ->name('solicitudes.index');

    Route::get('/dashboard', Dashboard::class)
            ->name('dashboard');
});


Route::get('/login', function (){
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

