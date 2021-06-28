<?php
use App\Http\Controllers\SubjectController;

Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subject.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subject.store');
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
Route::put('/subjects/{subject}/update', [SubjectController::class, 'update'])->name('subject.update');

Route::patch('/subjects/{id}/status', [SubjectController::class, 'update_status'])->name('subject.update.status');