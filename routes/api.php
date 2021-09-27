<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\HomeController;
use App\Http\Controllers\Api\v1\PackageController;
use App\Http\Controllers\Api\v1\StudentController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AchieverController;
use App\Http\Controllers\CounsellingController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userquerycontroller;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ShowPackage;



Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/grand-tests', [HomeController::class, 'getGrandTest']);


// Banner
    Route::get('/add-image', [PosterController::class, 'create'])->name('poster.create');
    Route::post('/add-image', [PosterController::class, 'store']);
    Route::get('/showimage', [PosterController::class, 'list'])->name('poster.show');
    Route::get('edit-image/{id}', [PosterController::class, 'edit']); 
    Route::put('update-image/{id}',[PosterController::class, 'update']); 
    Route::get('delete-image/{id}', [PosterController::class, 'destroy']); 
    
    Route::get('/headline', [HeadlineController::class, 'create'])->name('Headline.create');
    Route::post('/headline', [HeadlineController::class, 'store']);
    Route::get('/showhead', [HeadlineController::class, 'list'])->name('Headline.show');
    Route::get('edit-h/{id}', [HeadlineController::class, 'edit']); 
    Route::put('update-h/{id}',[HeadlineController::class, 'update']); 
    
    Route::get('/about', [AboutController::class, 'create'])->name('About.create');
    Route::post('/about', [AboutController::class, 'store']);
    Route::get('/showabout', [AboutController::class, 'list'])->name('About.show');
    Route::get('edit-a/{id}', [AboutController::class, 'edit']); 
    Route::put('update-a/{id}',[AboutController::class, 'update']); 
    
    // Achiever
    Route::get('/add-a', [AchieverController::class, 'create'])->name('pages/achiever.create');
    Route::post('/add-a', [AchieverController::class, 'store']);
    Route::get('/showa', [AchieverController::class, 'list'])->name('pages/achiever.show');
    Route::get('edit-a/{id}', [AchieverController::class, 'edit']); 
    Route::put('update-a/{id}',[AchieverController::class, 'update']); 
    Route::get('delete-a/{id}', [AchieverController::class, 'destroy']); 
    
    // Counselling
    Route::get('/add-c', [CounsellingController::class, 'create'])->name('pages/counselling.create');
    Route::post('/add-c', [CounsellingController::class, 'store']);
    Route::get('/showc', [CounsellingController::class, 'list'])->name('pages/counselling.show');
    Route::get('edit-c/{id}', [CounsellingController::class, 'edit']); 
    Route::put('update-c/{id}',[CounsellingController::class, 'update']); 
    Route::get('delete-c/{id}', [CounsellingController::class, 'destroy']); 
    
    // Notice
    Route::get('/add-n', [NoticeController::class, 'create'])->name('pages/notice.create');
    Route::post('/add-n', [NoticeController::class, 'store']);
    Route::get('/shown', [NoticeController::class, 'list'])->name('pages/notice.show');
    Route::get('edit-n/{id}', [NoticeController::class, 'edit']); 
    Route::put('update-n/{id}',[NoticeController::class, 'update']); 
    Route::get('delete-n/{id}', [NoticeController::class, 'destroy']); 
    
    
    // Payment Route
    
    Route::get('payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('payment', [PaymentController::class, 'store']);
    
    Route::get('showpayment', [PaymentController::class, 'show'])->name('payment.show');
    
    // userquery
    
    Route::get('userquery', [userquerycontroller::class, 'create'])->name('chat.userquery');
    Route::post('userquery', [userquerycontroller::class, 'store']);
    
    // packages
    Route::get('/showpackage', [ShowPackage::class, 'list'])->name('package.show');

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
    
    // tests
    Route::get('/tests', [TestController::class, 'list'])->name('test.index');
    
// Working Section after few changes name
Route::get('/test/q/{id}', [StudentController::class, 'getTestById']);


// Middleware Section

Route::get('/student/questions/{id}', [StudentController::class, 'getQuestionById']);
Route::get('/student/{id}/packages', [StudentController::class, 'getPackages']);
Route::get('/student/packages/{id}/tests', [StudentController::class, 'getPackageTests']);
Route::get('/student/test/{id}/attempt', [StudentController::class, 'createAttempt']);
Route::post('/student/attempt', [StudentController::class, 'storeAttemptDetails']);
Route::put('/student/attempt/{id}/update', [StudentController::class, 'updateAttempt']);
Route::post('/student/attempt-details/bookmark', [StudentController::class, 'bookmarkAttemptDetails']);
Route::post('/student/detail/solution', [StudentController::class, 'detailSolution']);
Route::get('/student/test/{id}/result', [StudentController::class, 'testResult']);
Route::get('package/{id}', [PackageController::class, 'show']);
    
    
    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        //students
        Route::post('/student/package/buy', [StudentController::class, 'buyPackage']);
       
    });

});

