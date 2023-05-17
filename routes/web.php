<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cash', [FrontendController::class, 'cash'])->name('cash-transaction');
Route::get('/card', [FrontendController::class, 'card'])->name('card-transaction');
Route::get('/bank', [FrontendController::class, 'bank'])->name('bank-transaction');
Route::get('/transaction/{transaction}', [FrontendController::class, 'showTransaction'])->name('show-transaction');

Route::post('/store-cash-transaction', [TransactionController::class, 'storeCashTransaction'])->name('store-cash-transaction');
Route::post('/store-card-transaction', [TransactionController::class, 'storeCardTransaction'])->name('store-card-transaction');
Route::post('/store-bank-transaction', [TransactionController::class, 'storeBankTransaction'])->name('store-bank-transaction');
