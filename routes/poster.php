<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosterController;



Route:: get('/poster', [PosterController::class, 'index'])->name('poster.index');

Route::get('/add-image', [PosterController::class, 'create'])->name('poster.create');

Route::post('/add-image', [PosterController::class, 'store']);

Route::get('/showimage', [PosterController::class, 'show'])->name('poster.show');