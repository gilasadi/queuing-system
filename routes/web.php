<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;

Route::get('/', [AntrianController::class, 'index']);
Route::get('/ambil-tiket/{jenis}', [AntrianController::class, 'ambilTiket']);

// Route::get('/', function () {
//     return view('welcome');
// });
