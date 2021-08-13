<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bannerController;


Route::any('/banner', [bannerController::class, 'create'])->name('banner.index');

Route::any('/show', [bannerController::class, 'show'])->name('banner.show');

Route::any('/test', [bannerController::class, 'create'])->name('banner.test');




// Route::view ('/banner', 'banner.index')->name('banner.index');
// Route::view ('/save', 'banner.save')->name('banner.save');
