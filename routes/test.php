<?php
use App\Http\Controllers\TestController;
use App\Http\Controllers\question_testController;


Route::get('/tests', [TestController::class, 'index'])->name('test.index');
Route::get('/tests/create', [TestController::class, 'create'])->name('test.create');
Route::post('/tests', [TestController::class, 'store'])->name('test.store');
Route::get('/tests/{test}/edit', [TestController::class, 'edit'])->name('test.edit');
Route::put('/tests/{test}/update', [TestController::class, 'update'])->name('test.update');

Route::patch('/tests/{id}/status', [TestController::class, 'update_status'])->name('test.update.status');

Route::get('test/questions', [TestController::class, 'test_questions'])->name('test.questions');
Route::post('test/questions', [TestController::class, 'store_test_questions'])->name('test.questions.store');

Route::get('/rantests', [TestController::class, 'index3'])->name('test.ran');
Route::post('/rantests', [TestController::class, 'randomData'])->name('test.ran');
Route::post('test/ques', [question_testController::class, 'store'])->name('test.question.store');


// dd
Route::get('/dd', [TestController::class, 'index2'])->name('test.dd');
Route::get('/test/q/{id}', [TestController::class, 'getAllQuestion'])->name('test.dd');
Route::get('/tes/ss/', [TestController::class, 'getAllQuestion'])->name('test.ss');


