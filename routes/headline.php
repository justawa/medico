<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadlineController;




Route::get('/headline', [HeadlineController::class, 'create'])->name('Headline.create');
Route::post('/headline', [HeadlineController::class, 'store']);
Route::get('/showhead', [HeadlineController::class, 'show'])->name('Headline.show');
Route::get('edit-h/{id}', [HeadlineController::class, 'edit']); 
Route::put('update-h/{id}',[HeadlineController::class, 'update']); 