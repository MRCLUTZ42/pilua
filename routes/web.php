<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PiluaController;

Route::get('/', [PiluaController::class, 'index']);
Route::post('/ask-pilua', [PiluaController::class, 'ask'])->name('ask.pilua');
Route::get('/loan-vs-sip', fn() => view('loan-vs-sip'));
Route::get('/crypto-tracker', fn() => view('crypto-tracker'));
Route::get('/portfolio', fn() => view('portfolio'));
Route::get('/what-if', fn() => view('what-if'));