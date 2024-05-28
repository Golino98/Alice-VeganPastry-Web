<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SweetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

// Rotta per la pagina iniziale
Route::get('/', [FrontController::class, 'getHome'])->name('home');

// Rotte per i tutti i dolci
Route::get('/sweet', [SweetController::class, 'index'])->name('sweet.index');

// Rotte per la pagina di controllo dell'amministratore
Route::get('/admin/panelControll', [AuthController::class, 'admin'])->name('admin.control');
Route::post('/admin/panelControll', [OrderController::class, 'modifyStatus'])->name('admin.modifyStatus');
Route::get('/admin/panelControll/{status}', [OrderController::class, 'listByStatus'])->name('admin.listByStatus');

// Rotte per i dolci -> amministratore può aggiungere i dolci
Route::get('/admin/insertSweet', [SweetController::class, 'insert'])->name('admin.insertSweet');
Route::post('/admin/insertSweet', [SweetController::class, 'save'])->name('admin.insertSweet');

// Rotte per i dolci -> amministratore può modificare i dolci
Route::get('/admin/modifySweet', [SweetController::class, 'retrieve'])->name('admin.modifySweet');
Route::get('/admin/modifySweet/{id}', [SweetController::class, 'modify'])->name('admin.modifySweetId');
Route::post('/admin/modifySweet/{id}', [SweetController::class, 'saveModification'])->name('admin.modifySweetId');

// Rotte per i dolci -> amministratore può eliminare i dolci
Route::post('/admin/deleteSweet/{id}', [SweetController::class, 'remove'])->name('admin.removeSweet');

// Rotte per le categorie -> amministratore può aggiungere le categorie
Route::get('/admin/insertCategory', [CategoryController::class, 'insert'])->name('admin.insertCategory');
Route::post('/admin/insertCategory', [CategoryController::class, 'save'])->name('admin.insertCategory');

// Rotte per le categorie -> amministratore può modificare le categorie
Route::get('/admin/modifyCategory', [CategoryController::class, 'retrieve'])->name('admin.modifyCategory');
Route::get('/admin/modifyCategory/{id}', [CategoryController::class, 'modify'])->name('admin.modifyCategoryId');
Route::post('/admin/modifyCategory/{id}', [CategoryController::class, 'saveModification'])->name('admin.modifyCategoryId');

// Rotte per le categorie -> amministratore può eliminare le categorie
Route::post('/admin/deleteCategory/{id}', [CategoryController::class, 'remove'])->name('admin.removeCategory');

// Rotte per un utente generico -> creazione di un profilo
Route::get('/user/register', [AuthController::class, 'registration'])->name('user.registration');
Route::post('/user/register', [AuthController::class, 'register'])->name('user.registration');

// Rotte per un utente generico -> login
Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

// Rotte per un utente generico -> può modificare il proprio profilo
Route::get('/user/modify', [AuthController::class, 'modification'])->name('user.modify');
Route::post('/user/modify', [AuthController::class, 'modify'])->name('user.modify');

// Rotte per il carrello
Route::get('/carrello',[CartController::class, 'showCart'])->name('cart.carrello');
Route::post('/carrello',[CartController::class, 'addToCart'])->name('cart.carrello');
Route::post('/cart',[CartController::class, 'removeItem'])->name('cart.removeItem');
// Nuova rotta per aggiornare la quantità
Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');


Route::get('/success', [StripeController::class, 'success'])->name('payment.success');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

// Rotte per gli ordini di un utente generico
Route::get('/ordini', [OrderController::class, 'getOrdersOfUser'])->name('user.orders');

// Rotte per i dolci divisi in base alla categoria -> da lasciare per ultimo (chiedere il motivo al profe)
Route::get('/{category}', [SweetController::class, 'show'])->name('sweet.show');


//rotte aggiunte da daniele
Route::get('/admin/register', [AuthController::class, 'adminregistration'])->name('admin.registration');
Route::post('/admin/register', [AuthController::class, 'adminregister'])->name('admin.registration');
