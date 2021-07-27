<?php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::any('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::any('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::view('/progress', 'user.progress')->name('user.progress');
Route::any('/progress', [UserController::class, 'progress'])->name('user.progress');
Route::any('/progressshow/{id}', [UserController::class, 'progressshow'])->name('user.show');

// Route::get('/packages/{package}/', [UserController::class, 'progress'])->name('user.progress');



