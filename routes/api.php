<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\GetUsersController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\User\PartialUpdateUserController;

// Routing untuk membuat pengguna baru
Route::post('/users', CreateUserController::class);

// Routing untuk mengambil daftar pengguna
Route::get('/users', GetUsersController::class);

// Routing untuk merubah daftar pengguna
Route::put('/users/{id}', UpdateUserController::class);

// Routing untuk update sebagian informasi daftar pengguna
Route::patch('/users/{id}', PartialUpdateUserController::class);