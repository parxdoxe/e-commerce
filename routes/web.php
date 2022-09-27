<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/produits', [ProductController::class, 'index'])->name('products');
Route::get('/produits/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/mon-panier', [CartController::class, 'index'])->name('cart');
Route::get('/ajouter-a-mon-panier/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/supprimer-de-mon-panier/{id}', [CartController::class, 'remove'])->name('remove.to.cart');

Route::get('/connexion', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/connexion', [LoginController::class, 'store']);
Route::get('/deconnexion', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/inscription', [RegisterController::class, 'index'])->name('register');
Route::post('/inscription', [RegisterController::class, 'store']);
