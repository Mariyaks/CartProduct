<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

Route::post('/google-login', [App\Http\Controllers\AuthController::class, 'loginWithGoogleToken']);

Route::get('/categories', [CategoryController::class, 'getCategory']); 
Route::get('/categories/{categoryId}', [CategoryController::class, 'getProductById']);
