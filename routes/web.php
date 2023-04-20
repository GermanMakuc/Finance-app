<?php

use Illuminate\Support\Facades\Route;
use App\Models\Income;
use App\Http\Controllers\IncomeController;

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

Route::get('/', [IncomeController::class, 'index'])->name('index');

Route::get('income/create', [IncomeController::class, 'create'])->name('income.create');
Route::get('income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
Route::get('income/show/{id}', [IncomeController::class, 'show'])->name('income.show');
Route::post('income/delete/{id}', [IncomeController::class, 'destroy'])->name('income.delete');
Route::post('income/update/{id}', [IncomeController::class, 'update'])->name('income.update');
Route::post('income/store', [IncomeController::class, 'store'])->name('income.store');
