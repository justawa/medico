<?php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');