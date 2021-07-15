<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\HomeController;
use App\Http\Controllers\Api\v1\PackageController;
use App\Http\Controllers\Api\v1\StudentController;
use App\Http\Controllers\PosterController;

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

Route::get('/add-image', [PosterController::class, 'create'])->name('poster.create');
Route::post('/add-image', [PosterController::class, 'store']);
Route::get('/showimage', [PosterController::class, 'list'])->name('poster.show');
Route::get('edit-image/{id}', [PosterController::class, 'edit']); 
Route::put('update-image/{id}',[PosterController::class, 'update']); 
Route::get('delete-image/{id}', [PosterController::class, 'destroy']); 