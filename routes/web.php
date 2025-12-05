<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota de listar usuários
Route::get('users', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('users.index');

// Rota para cadastrar usuário
Route::get('users/create', [UserController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('users.create');

Route::post('users', [UserController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('users.store');


// Rota de visualizar detalhes do usuário
Route::get('users/{user}', [UserController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('users.show');

require __DIR__.'/settings.php';
