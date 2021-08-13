<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userquerycontroller;



Route::get('userquery', [userquerycontroller::class, 'create'])->name('chat.userquery');
Route::post('userquery', [userquerycontroller::class, 'store']);