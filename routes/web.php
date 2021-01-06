<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/',[HomeController::class, 'index']);

Route::get('/login',[UserController::class, 'showLogin']);
Route::get('/register',[UserController::class, 'showRegister']);

Route::post('/login',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/profile',[UserController::class, 'showProfile']);
Route::get('/logout',[UserController::class, 'logout']);
Route::put('/profile-update/{user}',[UserController::class, 'update'])->name("user.update");
Route::delete('/profile-destroy/{user}',[UserController::class, 'destroy'])->name("user.destroy");

Route::get('/post/{post_id}',[PostController::class, 'showPost']);
Route::get('/post-new',[PostController::class, 'showNew']);
Route::post('/post-new',[PostController::class, 'new'])->name("post.new");
Route::put('/post-update/{post}',[PostController::class, 'update'])->name("post.update");
Route::delete('/post-destroy/{post}',[PostController::class, 'destroy'])->name("post.destroy");
