<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;


Route::get('/about', [AboutController::class, 'create'])->name('About.create');
Route::post('/about', [AboutController::class, 'store']);
Route::get('/showabout', [AboutController::class, 'show'])->name('About.show');
Route::get('edit-a/{id}', [AboutController::class, 'edit']); 
Route::put('update-a/{id}',[AboutController::class, 'update']); 