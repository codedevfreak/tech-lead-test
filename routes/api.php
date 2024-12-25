<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\GetUsersController;
use App\Http\Controllers\User\UpdateUserController;

// Routing untuk membuat pengguna baru
Route::post('/users', CreateUserController::class);

// Routing untuk mengambil daftar pengguna
Route::get('/users', GetUsersController::class);

// Routing untuk merubah daftar pengguna
Route::put('/users/{id}', UpdateUserController::class);