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
Route::resource('/api/barang', StocksController::class);
Route::post('/api/barang/new/data', [StocksController::class, 'store']);
Route::get('/api/barang/get/all', [StocksController::class, 'getAll']);
Route::get('/api/barang/search/{keyword}', [StocksController::class, 'search']);
Route::post('/api/barang/total', [TransactionsController::class, 'saveTotal']);
Route::post('/api/barang/trx', [TransactionsController::class, 'saveTrx']);