<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ContactoController;
use App\Http\Controllers\Backend\ResenaController;
//use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//ruta para administrador
require __DIR__.'/auth.php';
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

});


//ruta para guardar contacto

Route::post('/contacto', [ContactoController::class, 'guardar'])
    ->name('contacto.guardar');

Route::post('/resena', [ResenaController::class, 'guardar'])
    ->name('resena.guardar');

    use App\Http\Controllers\UsuarioController;


//registro
Route::post('/registro', [UsuarioController::class, 'store'])
    ->name('usuarios.store');

Route::view('/registro', 'registro');

//login

//ruta al click
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UsuarioController::class, 'login'])
    ->name('login.post');

//ruta de inicio sesion correctamente
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/dashboard', function () {

    if (!session()->has('usuario_id')) {
        return redirect('/login');
    }

    return view('dashboard');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});



//ruta para ir al inicio

Route::get('/welcome', function () {
    return view('welcome');
});


