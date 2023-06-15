<?php
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SweetController;
use App\Http\Controllers\AuthController;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;
use Tests\Localization\CaTest;

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

Route::get('/admin/panelControll', [AuthController::class, 'admin'])->name('admin.control');

Route::get('/admin/panelControll/insertSweet', [SweetController::class, 'insert'])->name('admin.insertSweet');
Route::post('/admin/panelControll/insertSweet', [SweetController::class, 'save'])->name('admin.insertSweet');

Route::get('/admin/panelControll/modifySweet', [SweetController::class, 'retrieve'])->name('admin.modifySweet');
Route::get('/admin/panelControll/modifySweet/{id}', [SweetController::class, 'modify'])->name('admin.modifySweetId');
Route::post('/admin/panelControll/modifySweet/{id}', [SweetController::class, 'saveModification'])->name('admin.modifySweetId');

Route::get('/admin/panelControll/insertCategory', [CategoryController::class, 'insert'])->name('admin.insertCategory');
Route::post('/admin/panelControll/insertCategory', [CategoryController::class, 'save'])->name('admin.insertCategory');

Route::get('/admin/panelControll/modifyCategory', [CategoryController::class, 'retrieve'])->name('admin.modifyCategory');
Route::get('/admin/panelControll/modifyCategory/{id}', [CategoryController::class, 'modify'])->name('admin.modifyCategoryId');
Route::post('/admin/panelControll/modifyCategory/{id}', [CategoryController::class, 'saveModification'])->name('admin.modifyCategoryId');

Route::post('/admin/panelControll/deleteSweet/{id}', [SweetController::class, 'remove'])->name('admin.removeSweet');
Route::post('/admin/panelControll/deleteCategory/{id}', [CategoryController::class, 'remove'])->name('admin.removeCategory');

Route::get('/user/register', [AuthController::class, 'registration'])->name('user.registration');
Route::post('/user/register', [AuthController::class, 'register'])->name('user.registration');

Route::get('/user/modify', [AuthController::class, 'modification'])->name('user.modify');
Route::post('/user/modify', [AuthController::class, 'modify'])->name('user.modify');

Route::get('/{category}', [SweetController::class, 'show'])->name('sweet.show');