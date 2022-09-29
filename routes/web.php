<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
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


Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/envoie-email', [ContactController::class, 'sendEmail'])->name('contact.email');

Route::get('/produits', [ProductController::class, 'index'])->name('products');
Route::get('/produits/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/categorie/{category}-{name}', [ProductController::class, 'category'])->name('products.category');

Route::get('/mon-panier', [CartController::class, 'index'])->name('cart');
Route::get('/ajouter-a-mon-panier/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/supprimer-de-mon-panier/{id}', [CartController::class, 'remove'])->name('remove.to.cart');

Route::get('/connexion', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/connexion', [LoginController::class, 'store']);
Route::get('/deconnexion', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/inscription', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/inscription', [RegisterController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/admin/produits', [AdminController::class, 'product'])->name('admin.product')->middleware('admin');
Route::get('/admin/produits/nouveau', [AdminController::class, 'create'])->name('admin.create')->middleware('admin');
Route::post('/admin/produits/nouveau', [AdminController::class, 'store'])->middleware('admin');
Route::get('/admin/produits/{product}/modifier', [AdminController::class, 'edit'])->name('admin.edit')->middleware('admin');
Route::put('/admin/produits/{product}/modifier', [AdminController::class, 'update'])->middleware('admin');
Route::delete('/admin/produits/{product}/supprimer', [AdminController::class, 'destroy'])->name('admin.delete')->middleware('admin');


