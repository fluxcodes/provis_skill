<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSession;

Route::get('/', function () {
    return view('welcome');
})->name('loginPage');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/dashboard', function () {
    return view('dashboard');
})->middleware(CheckSession::class)->name('dashboard');

Route::get('/session-prompt', function () {
    return view('prompt');
})->name('prompt');

Route::get('/close-redirect', [UserController::class, 'closeAndRedirect'])->name('close_session_and_redirect');