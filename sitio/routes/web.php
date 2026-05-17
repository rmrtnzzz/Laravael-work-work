<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstadisticasController;

// Página pública
Route::get('/', function () {
    $articulos = \App\Models\Articulo::latest()->take(6)->get();
    return view('inicio', compact('articulos'));
})->name('inicio');

// Dashboard - Admin y Trabajador
Route::middleware(['auth', 'role:admin,trabajador'])->group(function () {
    Route::get('/panel', function () {
        $totalArticulos = \App\Models\Articulo::count();
        $totalUsuarios  = \App\Models\User::count();
        $recientes      = \App\Models\Articulo::with('user')->latest()->take(5)->get();
        return view('panel.dashboard', compact('totalArticulos', 'totalUsuarios', 'recientes'));
    })->name('dashboard');

    Route::get('/panel/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
    Route::get('/panel/articulos/{articulo}', [ArticuloController::class, 'show'])->name('articulos.show');
});

// Solo Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/panel/articulos/crear', [ArticuloController::class, 'create'])->name('articulos.create');
    Route::post('/panel/articulos', [ArticuloController::class, 'store'])->name('articulos.store');
    Route::get('/panel/articulos/{articulo}/editar', [ArticuloController::class, 'edit'])->name('articulos.edit');
    Route::put('/panel/articulos/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');
    Route::delete('/panel/articulos/{articulo}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');

    // Estadísticas
    Route::get('/panel/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');
    Route::get('/panel/estadisticas/exportar', [EstadisticasController::class, 'exportar'])->name('estadisticas.exportar');
    Route::get('/panel/estadisticas/pdf', [EstadisticasController::class, 'reportePdf'])->name('estadisticas.pdf');

    // Usuarios
    Route::get('/panel/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/panel/usuarios/{user}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/panel/usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/panel/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
});

require __DIR__.'/auth.php';
