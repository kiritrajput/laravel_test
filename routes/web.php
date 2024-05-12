<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'user'], function(){
        Route::view('/get-email-form','main')->name('user.form');
        Route::post('/upload',[UserController::class, 'upload'])->name('ckeditor.upload');
        Route::post('/post-save-email-data',[UserController::class, 'saveEmailData'])->name('post-save-email-data');
        Route::get('/fetch-data',[UserController::class,'fetchData'])->name('fetch-data');
        Route::get('/show-data',[UserController::class,'showData'])->name('show-data');
});

