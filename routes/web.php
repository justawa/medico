<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/course.php';
require __DIR__.'/question.php';
require __DIR__.'/subject.php';
require __DIR__.'/test.php';
require __DIR__.'/user.php';
require __DIR__.'/banner.php';
require __DIR__.'/poster.php';
require __DIR__.'/payment.php';
require __DIR__.'/user.php';
require __DIR__.'/ticket.php';
require __DIR__.'/userquery.php';

