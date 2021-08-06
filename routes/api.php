<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\HomeController;
use App\Http\Controllers\Api\v1\PackageController;
use App\Http\Controllers\Api\v1\StudentController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userquerycontroller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/grand-tests', [HomeController::class, 'getGrandTest']);
    
    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);

        //students
        Route::post('/student/package/buy', [StudentController::class, 'buyPackage']);
        Route::get('/student/{id}/packages', [StudentController::class, 'getPackages']);
        Route::get('/student/packages/{id}/tests', [StudentController::class, 'getPackageTests']);
        Route::get('/student/test/{id}/attempt', [StudentController::class, 'createAttempt']);
        Route::get('/student/questions/{id}', [StudentController::class, 'getQuestionById']);
        Route::post('/student/attempt', [StudentController::class, 'storeAttemptDetails']);
        Route::put('/student/attempt/{id}/update', [StudentController::class, 'updateAttempt']);
        Route::post('/student/attempt-details/bookmark', [StudentController::class, 'bookmarkAttemptDetails']);
        Route::post('/student/detail/solution', [StudentController::class, 'detailSolution']);
        Route::get('/student/test/{id}/result', [StudentController::class, 'testResult']);
        Route::get('package/{id}', [PackageController::class, 'show']);
    });

});

//Banner Route 

Route::get('/add-image', [PosterController::class, 'create'])->name('poster.create');
Route::post('/add-image', [PosterController::class, 'store']);
Route::get('/showimage', [PosterController::class, 'list'])->name('poster.show');
Route::get('edit-image/{id}', [PosterController::class, 'edit']); 
Route::put('update-image/{id}',[PosterController::class, 'update']); 
Route::get('delete-image/{id}', [PosterController::class, 'destroy']); 

// Payment Route

Route::get('payment', [PaymentController::class, 'create'])->name('payment.create');
Route::post('payment', [PaymentController::class, 'store']);

Route::get('showpayment', [PaymentController::class, 'show'])->name('payment.show');

// userquery

Route::get('userquery', [userquerycontroller::class, 'create'])->name('chat.userquery');
Route::post('userquery', [userquerycontroller::class, 'store']);


// Users

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::any('/users/{user}/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::any('/users/{user}/update', [UserController::class, 'update'])->name('user.update');

Route::any('/progress/{user}', [UserController::class, 'progress'])->name('user.progress');
Route::any('/progressshow/{id}', [UserController::class, 'progressshow'])->name('user.show');
Route::any('/ebook/{user}', [UserController::class, 'ebook'])->name('user.ebook');
Route::any('/subscription/{user}', [UserController::class, 'subscription'])->name('user.subscription');
Route::any('/report/{user}', [UserController::class, 'report'])->name('user.report');
Route::any('/review/{user}', [UserController::class, 'review'])->name('user.review');






// User Package 
Route::get('/users/{user}/package', [UserController::class, 'package'])->name('user.package');
//Route::get('/users/{user}/package/remove', [UserController::class, 'removePackage'])->name('user.removePackage');
Route::post('/users/package/{id}/status', [UserController::class, 'update_status'])->name('package.update.status');
// User Tickets
Route::get('/users/{user}/ticket', [UserController::class, 'ticket'])->name('user.tickets');
Route::patch('/tickets/{id}/reply', [UserController::class, 'sendReply'])->name('user.sendReply');
Route::patch('/tickets/{id}/status', [UserController::class, 'ticket_status'])->name('user.update.status');


