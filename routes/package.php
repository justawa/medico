<?php
use App\Http\Controllers\PackageController;

Route::get('/packages', [PackageController::class, 'index'])->name('package.show');
Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
Route::post('/packages', [PackageController::class, 'store'])->name('package.store');
Route::get('/packages/{package}/edit', [PackageController::class, 'edit'])->name('package.edit');
Route::put('/packages/update/{id}', [PackageController::class, 'update'])->name('package.update');

Route::patch('/packages/{id}/status', [PackageController::class, 'update_status'])->name('package.update.status');