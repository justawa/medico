<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosterController;



Route::get('/add-image', [PosterController::class, 'create'])->name('poster.create');

Route::post('/add-image', [PosterController::class, 'store']);

Route::get('/showimage', [PosterController::class, 'show'])->name('poster.show');
Route::get('edit-image/{id}', [PosterController::class, 'edit']); 
Route::put('update-image/{id}',[PosterController::class, 'update']); 
Route::get('delete-image/{id}', [PosterController::class, 'destroy']); 