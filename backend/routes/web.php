<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\TransactionsController;

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
Route::resource('/api/toserba', StocksController::class);
Route::post('/api/toserba/new/data', [StocksController::class, 'store']);
Route::get('/api/toserba/get/all', [StocksController::class, 'getAll']);
Route::get('/api/toserba/search/{keyword}', [StocksController::class, 'search']);
Route::post('/api/toserba/total', [TransactionsController::class, 'saveTotal']);
Route::post('/api/toserba/trx', [TransactionsController::class, 'saveTrx']);