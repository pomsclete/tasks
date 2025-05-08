<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

/**********************************************************
***************** Gère la redirection selon le profile ***
***************************************************************/
Route::get('/home',[HomeController::class,'index'])->name('home');
});


/**********************************************************
***************** Route for admin role***
***************************************************************/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'index'])
        ->name('admin.dashboard');

    Route::view('/admin/service','pages.admin.page-service')->name('admin.service');
    Route::view('/admin/employe','pages.admin.page-employe')->name('admin.employe');
    Route::view('/admin/tasks','pages.admin.page-task')->name('admin.task');

});

/**********************************************************
***************** Route for user role***
***************************************************************/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('user/dashboard',[UserController::class,'index'])
    ->name('user.dashboard');
    
});
