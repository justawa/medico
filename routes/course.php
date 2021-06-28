<?php
use App\Http\Controllers\CourseController;

Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/courses/{course}/update', [CourseController::class, 'update'])->name('course.update');

Route::patch('/courses/{id}/status', [CourseController::class, 'update_status'])->name('course.update.status');