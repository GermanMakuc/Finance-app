<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\BalanceController;

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

Route::get('/', [BalanceController::class, 'index'])->name('index');
Route::get('/balance/{month}', [BalanceController::class, 'byMonth'])->name('balance.month');

Route::get('income/create', [IncomeController::class, 'create'])->name('income.create');
Route::get('income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
Route::get('income/show/{id}', [IncomeController::class, 'show'])->name('income.show');
Route::post('income/delete/{id}', [IncomeController::class, 'destroy'])->name('income.delete');
Route::post('income/update/{id}', [IncomeController::class, 'update'])->name('income.update');
Route::post('income/store', [IncomeController::class, 'store'])->name('income.store');

Route::get('expenses/create', [ExpensesController::class, 'create'])->name('expenses.create');
Route::get('expenses/edit/{id}', [ExpensesController::class, 'edit'])->name('expenses.edit');
Route::get('expenses/show/{id}', [ExpensesController::class, 'show'])->name('expenses.show');
Route::post('expenses/delete/{id}', [ExpensesController::class, 'destroy'])->name('expenses.delete');
Route::post('expenses/update/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
Route::post('expenses/store', [ExpensesController::class, 'store'])->name('expenses.store');
