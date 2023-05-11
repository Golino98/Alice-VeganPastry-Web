<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'getHome'])->name('home');

//Rotta che mi permette di andare nella pagina di login
Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');