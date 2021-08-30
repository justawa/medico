<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounsellingController;



Route::get('/add-c', [CounsellingController::class, 'create'])->name('pages/counselling.create');

Route::post('/add-c', [CounsellingController::class, 'store']);

Route::get('/showc', [CounsellingController::class, 'show'])->name('pages/counselling.show');
Route::get('edit-c/{id}', [CounsellingController::class, 'edit']); 
Route::put('update-c/{id}',[CounsellingController::class, 'update']); 
Route::get('delete-c/{id}', [CounsellingController::class, 'destroy']); 