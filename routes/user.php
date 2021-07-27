<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::any('/users/{user}/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::any('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::view('/progress', 'user.progress')->name('user.progress');
Route::any('/progress', [UserController::class, 'progress'])->name('user.progress');
Route::any('/progressshow/{id}', [UserController::class, 'progressshow'])->name('user.show');
// Package
Route::get('/users/{user}/package', [UserController::class, 'package'])->name('user.package');
//Route::get('/users/{user}/package/remove', [UserController::class, 'removePackage'])->name('user.removePackage');
Route::post('/users/package/{id}/status', [UserController::class, 'update_status'])->name('package.update.status');

