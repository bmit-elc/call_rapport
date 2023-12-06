<?php

use App\Http\Controllers\myController;
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



// Route::get('/daten-anzeigen', function () {
//     $daten = CallAccounting::all();
//     return view('welcome', ['daten' => $daten]);
// });

Route::get('/', myController::class.'@index') ->name('daten.welcome');
// Weitere Routen hier definieren...