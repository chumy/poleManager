<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\InscritoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*

Route::get('/', function () {
    $locale = App::currentLocale(); 
    return view('welcome');
});*/



Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/lang/{key}', function (string $key) {
    if (! in_array($key, ['en', 'es'])) {
        $key ='en';
    }
    session()->put('locale', $key);
    App::setLocale($key);
    
    return redirect('/');
});

Route::get('/search', [WelcomeController::class, 'search'])->name('search');

Route::get('/campeonato/{campeonato}/{carrera?}', [CampeonatoController::class, 'show'])->name('campeonato.show');

Route::get('/driver/{driver}', [UserController::class, 'show'])->name('user.show');

Route::get('/ranking', [WelcomeController::class, 'showRanking'])->name('ranking');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ProfileController::class, 'show'])->name('dashboard');
    
});

Route::middleware('auth')->middleware('verified')->group(function () {

    
    Route::post('/dashboard/searchCampeonato', [ProfileController::class, 'search'])->name('campeonato.search');

    Route::get('/campeonatos', [CampeonatoController::class, 'index'])->name('campeonato.index');

    Route::get('/campeonato', [CampeonatoController::class, 'create'])->name('campeonato.create');
    Route::put('/campeonato/{campeonato}', [CampeonatoController::class, 'update'])->name('campeonato.update');

    Route::post('/campeonato/{campeonato}', [CampeonatoController::class, 'start'])->name('campeonato.start');

    

    Route::post('/campeonatos', [CampeonatoController::class, 'store'])->name('campeonato.store');
    Route::delete('/campeonatos/{campeonato}', [CampeonatoController::class, 'destroy'])->name('campeonato.destroy');


    Route::get('/campeoantocarreras/{campeonato}', [CarreraController::class, 'create'])->name('carreras.create');
    Route::post('/campeoantocarreras', [CarreraController::class, 'store'])->name('carreras.store');

    Route::post('/inscripcion', [InscritoController::class, 'store'])->name('inscripcion.store');
    Route::post('/inscripcion/bot', [InscritoController::class, 'storeBot'])->name('inscripcion.bot.store');
    Route::delete('/inscripcion/borrar', [InscritoController::class, 'destroyBot'])->name('inscripcion.delete');
    Route::get('/inscripcion/{campeonato}', [InscritoController::class, 'create'])->name('inscripcion.create');
    Route::delete('/inscripcion/{campeonato}', [InscritoController::class, 'destroy'])->name('inscripcion.destroy');
    Route::get('/inscripcion/bot/{campeonato}', [InscritoController::class, 'createBot'])->name('inscripcion.bot.create');

 
    Route::post('/resultado', [ResultadoController::class, 'storeAll'])->name('resultado.storeAll');
    Route::get('/resultado/{carrera}', [ResultadoController::class, 'create'])->name('resultado.create');
    Route::post('/resultado/{carrera}/{inscrito}', [ResultadoController::class, 'store'])->name('resultado.store');
    Route::get('/resultado/{carrera}/{inscrito}', [ResultadoController::class, 'show'])->name('resultado.show');
    Route::put('/resultado/{carrera}', [ResultadoController::class, 'check'])->name('resultados.check');

});    

require __DIR__.'/auth.php';
