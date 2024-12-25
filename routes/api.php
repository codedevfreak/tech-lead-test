<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\GetUsersController;

// Routing untuk membuat pengguna baru
Route::post('/users', CreateUserController::class);

// Routing untuk mengambil daftar pengguna
Route::get('/users', GetUsersController::class);

