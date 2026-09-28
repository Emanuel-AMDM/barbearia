<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', function () {
    return view('principal.pages.index');
})->name('home');

Route::get('/login', function (){
    return view('auth.login');
})->name('login');

Route::get('/register', function (){
    return view('auth.register');
})->name('register');

// Cada aba do formulário de registrar.blade.php tem um <form> com action diferente,
// por isso são duas rotas POST separadas em vez de uma só.
Route::post('/registerClient', [RegisterController::class, 'storeClient'])->name('register.client');
Route::post('/registerBarber', [RegisterController::class, 'storeBarber'])->name('register.barber');

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
