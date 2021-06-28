<?php
use App\Http\Controllers\QuestionController;

Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
Route::put('/questions/{question}/update', [QuestionController::class, 'update'])->name('question.update');

Route::patch('/questions/{id}/status', [QuestionController::class, 'update_status'])->name('question.update.status');


// Apis Route for admin area
Route::get('/subject-wise-questions', [QuestionController::class, 'subject_wise_questions'])->name('subject.wise.questions');