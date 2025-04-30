<?php

use App\Http\Controllers\HabitantesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas sin controladores que se ocupan para llamar a los index de cada parte
Route::middleware('auth')->group(function () {


    Route::view('Listado/vacunas/edades', 'Informes.index-vacunas');
    Route::view('Listado/vacunas/por-anio', 'Informes.index-vacunas-anio');

    Route::view('Comunidades/index', 'Comunidades.comunidades-index');

    Route::view('Viviendas/index', 'Viviendas.index-viviendas');

    Route::view('Familias/index', 'Familias.familias-index');

    Route::view('Generos/index', 'Generos.genero-index');
});

Route::middleware('auth')->group(function () {
    Route::controller(HabitantesController::class)->group(function () {

        Route::get('Habitantes/opciones', 'indexHabitante');
        Route::get('Habitantes/listado-habitantes', 'opcionListadoHabitantes')->name('opcionListHabitantes');
        Route::get('Habitantes/listado-no-activos', 'opcionHabitantesNoActivos')->name('opcionListNoActivos');
    });
});


require __DIR__.'/auth.php';
