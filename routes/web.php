<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'ProductShow'])->name('products');
Route::post('/admin/productadd', [ProductController::class, 'ProductAdd'])->name('productadd');
Route::get('/productlist', [ProductController::class, 'ProductList'])->name('productlist');
Route::get('/productedit/{id}', [ProductController::class, 'ProductEdit'])->name('productedit');
Route::put('/update/{id}', [ProductController::class, 'ProductUpdate'])->name('update');