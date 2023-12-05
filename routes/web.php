<?php

use App\Models\CallAccounting;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daten-anzeigen', function () {
    $daten = CallAccounting::all();
    return view('welcome', ['daten' => $daten]);
});

// Weitere Routen hier definieren...