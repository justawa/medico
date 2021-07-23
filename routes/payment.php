<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;



Route::get('payment', [PaymentController::class, 'create'])->name('payment.create');
Route::post('payment', [PaymentController::class, 'store']);

Route::get('showpayment', [PaymentController::class, 'show'])->name('payment.show');

