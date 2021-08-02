<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::any('/users/{user}/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::any('/users/{user}/update', [UserController::class, 'update'])->name('user.update');

Route::any('/progress/{user}', [UserController::class, 'progress'])->name('user.progress');
Route::any('/progressshow/{id}', [UserController::class, 'progressshow'])->name('user.show');
Route::any('/ebook/{user}', [UserController::class, 'ebook'])->name('user.ebook');
Route::any('/subscription/{user}', [UserController::class, 'subscription'])->name('user.subscription');
Route::any('/report/{user}', [UserController::class, 'report'])->name('user.report');
Route::any('/review/{user}', [UserController::class, 'review'])->name('user.review');






// Package
Route::get('/users/{user}/package', [UserController::class, 'package'])->name('user.package');
//Route::get('/users/{user}/package/remove', [UserController::class, 'removePackage'])->name('user.removePackage');
Route::post('/users/package/{id}/status', [UserController::class, 'update_status'])->name('package.update.status');
// Tickets
Route::get('/users/{user}/ticket', [UserController::class, 'ticket'])->name('user.tickets');
Route::patch('/tickets/{id}/reply', [UserController::class, 'sendReply'])->name('user.sendReply');
Route::patch('/tickets/{id}/status', [UserController::class, 'ticket_status'])->name('user.update.status');


