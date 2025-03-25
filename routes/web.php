<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\RegisterController;

Route::get('/', HomeController::class);

Route::get('/podcast/{parametro1}/{parametro2?}', [PodcastController::class, 'podcast']);

Route::get('/podcast/{parametro}/{parametro2?}', function ($parametro, $parametro2 = null) {
    return $parametro2 === null
        ? "El tema de hoy será $parametro"
        : "El tema de hoy es $parametro de la categoría $parametro2";
});

Route::prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/password')->group(function () {
    Route::get('/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
    Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetFormWithToken']);
    Route::post('/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::prefix('/movimientos')->group(function () {
    Route::get('/', [MovimientoController::class, 'index'])->name('movimientos.index');
    Route::get('/create', [MovimientoController::class, 'create'])->name('movimientos.create');
    Route::post('/', [MovimientoController::class, 'store'])->name('movimientos.store');
    Route::get('/{movimiento}', [MovimientoController::class, 'show'])->name('movimientos.show');
    Route::get('/{movimiento}/edit', [MovimientoController::class, 'edit'])->name('movimientos.edit');
    Route::put('/{movimiento}', [MovimientoController::class, 'update'])->name('movimientos.update');
    Route::delete('/{movimiento}', [MovimientoController::class, 'destroy'])->name('movimientos.destroy');
});

Route::prefix('/register')->group(function () {
    /*paso 1*/Route::get('/', [RegisterController::class, 'create'])->name('register.create');
    /*paso 2*/Route::post('/', [RegisterController::class, 'store'])->name('register.store');
    /*paso 3*/Route::get('/{user}', [RegisterController::class, 'show'])->name('register.show');
    Route::get('/{user}/edit', [RegisterController::class, 'edit'])->name('register.edit');
    Route::put('/{user}', [RegisterController::class, 'update'])->name('register.update');
    Route::delete('/{user}', [RegisterController::class, 'destroy'])->name('register.destroy');
});

Route::get('/metodohead', function () {
    $response = Http::head('https://www.uvic.cat/sites/default/files/altres_a2016_guia_elaborar_citas.pdf');
    if ($response->successful()) {
        $tipoArchivo = $response->header('Content-Type');
        $partes = explode('/', $tipoArchivo);
        $extension = end($partes);
        $tamannoArchivo = $response->header('Content-Length') / 1024;
        echo 'Tipo de contenido: ' . $extension . "<br>";
        echo 'Tamaño del archivo: ' . round($tamannoArchivo, 0) . " kb <br>";
    } else {
        echo 'Error: ' . $response->status() . "\n";
    }
});

Route::prefix('/productos')->group(function () {
    Route::get('/', [ProductosController::class, 'index']);
    Route::get('/create', [ProductosController::class, 'create']);
    Route::post('/create', [ProductosController::class, 'store']);
    Route::get('/{id}', [ProductosController::class, 'show']);
    Route::get('/{id}/edit', [ProductosController::class, 'edit']);
    Route::put('/{id}', [ProductosController::class, 'update']);
    Route::delete('/{id}', [ProductosController::class, 'destroy']);
});

