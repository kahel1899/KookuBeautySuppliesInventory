<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/kookuproducts', [ProductController::class, 'index']);
Route::post('/kookuproducts', [ProductController::class, 'store']);
Route::put('/kookuproducts/{id}', [ProductController::class, 'update']);