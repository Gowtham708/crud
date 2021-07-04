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

Route::get('/createusers',[UserController::class,'index'])->name('user.index');
Route::post('/storeusers',[UserController::class,'store'])->name('user.store');

Route::get('/editusers/{id}',[UserController::class,'edit'])->name('user.index');
Route::post('/updateusers/{user}',[UserController::class,'update'])->name('user.update');
Route::delete('/deleteusers/{user}',[UserController::class,'destroy'])->name('user.destroy');

 Route::post('/createusers',[UserController::class,'index'])->name('user.index');