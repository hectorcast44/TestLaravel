<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Contracts\View\View;

Route::get('/', function () {
    return view('home');
});

// Rutas CRUD para empleados
Route::resource('empleados', EmpleadoController::class);

require __DIR__.'/settings.php';
