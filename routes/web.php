<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Livewire\SolicitudesList;
use App\Livewire\SolicitudCreate;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('animales', AnimalController::class);

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
    return redirect('/');
})->name('logout');

