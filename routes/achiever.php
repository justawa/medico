<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchieverController;



Route::get('/add-a', [AchieverController::class, 'create'])->name('pages/achiever.create');

Route::post('/add-a', [AchieverController::class, 'store']);

Route::get('/showa', [AchieverController::class, 'show'])->name('pages/achiever.show');
Route::get('edit-a/{id}', [AchieverController::class, 'edit']); 
Route::put('update-a/{id}',[AchieverController::class, 'update']); 
Route::get('delete-a/{id}', [AchieverController::class, 'destroy']); 