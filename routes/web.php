<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'customReport']);
Route::get('/index', [App\Http\Controllers\IndexController::class, 'customReport'])->name('index');
Route::get('/custom-report', [App\Http\Controllers\IndexController::class, 'customReport']);
Route::get('/data', [App\Http\Controllers\DataController::class, 'view']);
Route::post('/data/submit', [App\Http\Controllers\DataController::class, 'addTransection']);