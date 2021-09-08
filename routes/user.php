<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewUserController;


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::any('/users/{user}/store', [UserController::class, 'store'])->name('user.store');

Route::any('/newuser', [NewUserController::class, 'index'])->name('user.newuser');
Route::any('/newusers', [NewUserController::class, 'store'])->name('newuser.store');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::any('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::any('/users/{user}/useractive', [UserController::class, 'update_active'])->name('user.update_active');

Route::any('/progress', [UserController::class, 'progress'])->name('user.progress');
Route::any('/progressshow/{id}', [UserController::class, 'progressshow'])->name('user.show');
Route::any('/ebook/{user}', [UserController::class, 'ebook'])->name('user.ebook');
Route::any('/subscription/{user}', [UserController::class, 'subscription'])->name('user.subscription');
Route::any('/report/{user}', [UserController::class, 'report'])->name('user.report');
Route::any('/review/{user}', [UserController::class, 'review'])->name('user.review');
Route::any('/chat/{user}', [UserController::class, 'chat'])->name('user.chat');







// Package
Route::get('/users/{user}/package', [UserController::class, 'package'])->name('user.package');
//Route::get('/users/{user}/package/remove', [UserController::class, 'removePackage'])->name('user.removePackage');
Route::post('/users/package/{id}/status', [UserController::class, 'update_status'])->name('package.update.status');
// Tickets
Route::get('/sideticket', [UserController::class, 'sideticket'])->name('tickets.show');


Route::get('/users/{user}/ticket', [UserController::class, 'ticket'])->name('user.tickets');
Route::patch('/tickets/{id}/reply', [UserController::class, 'sendReply'])->name('user.sendReply');
Route::any('/tickets/{id}/status', [UserController::class, 'ticket_status'])->name('user.update.status');


