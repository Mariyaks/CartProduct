<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

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

Auth::routes();

Route::get('/', function () {return redirect('login');})->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Product
Route::get('/products', [ProductController::class, 'ProductShow'])->name('products');
Route::post('/admin/productadd', [ProductController::class, 'ProductAdd'])->name('productadd');
Route::get('/productlist', [ProductController::class, 'ProductList'])->name('productlist');
Route::get('/productedit/{id}', [ProductController::class, 'ProductEdit'])->name('productedit');
Route::put('/productupdate/{id}', [ProductController::class, 'ProductUpdate'])->name('productupdate');
Route::get('/product/delete/{id}', [ProductController::class,'ProductDelete'])->name('productdelete');

//Category
Route::get('/category', [CategoryController::class, 'CategoryShow'])->name('category');
Route::get('/categorylist', [CategoryController::class, 'CategoryList'])->name('categorylist');
Route::post('/admin/categoryadd', [CategoryController::class, 'CategoryAdd'])->name('categoryadd');
Route::get('/categoryedit/{id}', [CategoryController::class, 'CategoryEdit'])->name('categoryedit');
Route::put('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('update');
Route::get('/delete/{id}', [CategoryController::class, 'CategroyDelete'])->name('delete');

//AddToCart
Route::get('/cart/add/{productId}', [CartController::class, 'ViewCart'])->name('cartadd');
Route::get('/send-cart-to-whatsapp', [CartController::class,'sendCartToWhatsApp'])->name('sendCartToWhatsApp');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cartadd');