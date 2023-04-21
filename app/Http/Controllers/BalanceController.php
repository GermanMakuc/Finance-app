<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BalanceController extends Controller
{

    public function index()
    {
        $income = Income::get();
        $expenses = Expenses::get();

        return view('balance.index', compact('income', 'expenses'));
    }

    public function byMonth($month) : JsonResponse
    {

        $incomeMonth = Income::whereMonth('amount_date', $month)->get()->sum('amount');
        $expenseMonth = Expenses::whereMonth('amount_date', $month)->get()->sum('amount');

        return response()->json([
            'incomes' => $incomeMonth,
            'expenses' => $expenseMonth
        ]);
    }

    public function totals() : JsonResponse
    {

        $totalIncomes = Income::get()->sum('amount');
        $totalExpenses = Expenses::get()->sum('amount');

        return response()->json([
            'incomes' => $totalIncomes,
            'expenses' => $totalExpenses
        ]);
    }
}
