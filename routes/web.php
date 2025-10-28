<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Contracts\View\View;

Route::get('/', function () {
    return view('home');
});

Route::get('/empleados', [EmpleadoController::class, 'index']);

require __DIR__.'/settings.php';
