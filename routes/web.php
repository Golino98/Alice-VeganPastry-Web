<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SweetController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

//Rotta che mi permette di andare nella pagina di login
Route::get('/', [FrontController::class, 'getHome'])->name('home');

Route::get('/sweet', [SweetController::class, 'index'])->name('sweet.index');

Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/user/register', [AuthController::class, 'registration'])->name('user.registration');
Route::post('/user/register', [AuthController::class, 'register'])->name('user.registration');

Route::get('/user/modify', [AuthController::class, 'modification'])->name('user.modify');
Route::post('/user/modify', [AuthController::class, 'modify'])->name('user.modify');
