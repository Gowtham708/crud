<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\UserController;
use App\Mail\getPassword;

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

Route::get('/login',[ValidationController::class,'login'])->name('login');
Route::post('/post-login',[ValidationController::class,'loginForm'])->name('auth');
Route::get('/forgot',[ValidationController::class,'forgot'])->name('forgot');
Route::get('/sent',[ValidationController::class,'sentemail'])->name('sent');
Route::get('/logout',[ValidationController::class,'logout'])->name('logout');
Route::post('/forgotpassword',[ValidationController::class,'forgotpassword'])->name('forgotpassword');
Route::get('/setpassword/{email}',[ValidationController::class,'setpassword'])->name('setpassword');
Route::post('/newpassword',[ValidationController::class,'newpassword'])->name('newpassword');



Route::get('/createusers',[UserController::class,'index'])->name('user.index');
Route::post('/storeusers',[UserController::class,'store'])->name('user.store');


Route::post('/updateusers/{user}',[UserController::class,'update'])->name('user.update');
Route::post('/deleteusers/{user}',[UserController::class,'destroy'])->name('user.destroy');

