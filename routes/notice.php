<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;



Route::get('/add-n', [NoticeController::class, 'create'])->name('pages/notice.create');

Route::post('/add-n', [NoticeController::class, 'store']);

Route::get('/shown', [NoticeController::class, 'show'])->name('pages/notice.show');
Route::get('edit-n/{id}', [NoticeController::class, 'edit']); 
Route::put('update-n/{id}',[NoticeController::class, 'update']); 
Route::get('delete-n/{id}', [NoticeController::class, 'destroy']); 





