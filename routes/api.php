<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('categories', [CategoryController::class, 'list']);
Route::get('ads', [AdsController::class, 'list']);
Route::get('brands', [BrandController::class, 'list']);
