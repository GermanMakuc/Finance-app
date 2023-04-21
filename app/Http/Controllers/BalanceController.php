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

        $monthArr = array(
            'Enero', 'Febrero', 'Marzo', 'Abril',
            'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );

        return view('balance.index', compact('income', 'expenses','monthArr'));
    }

    public function byMonth($month) : JsonResponse
    {

        $incomeMonth = Income::whereMonth('amount_date', $month)->get()->sum('amount');
        $expenseMonth = Expenses::whereMonth('amount_date', $month)->get()->sum('amount');

        $balance = 0;
        $balance = $incomeMonth - $expenseMonth;

        return response()->json([
            'incomes' => $incomeMonth,
            'expenses' => $expenseMonth,
            'balance' => $balance,
            'state' => $this->getLabelBalance($balance, $incomeMonth, $expenseMonth)
        ]);
    }

    public function totals() : JsonResponse
    {

        $totalIncomes = Income::get()->sum('amount');
        $totalExpenses = Expenses::get()->sum('amount');

        $balance = 0;
        $balance = $totalIncomes - $totalExpenses;

        return response()->json([
            'incomes' => $totalIncomes,
            'expenses' => $totalExpenses,
            'balance' => $balance,
            'state' => $this->getLabelBalance($balance, $totalIncomes, $totalExpenses),
        ]);
    }

    public function getLabelBalance($balance, $incomeMonth, $expenseMonth)
    {
        $state = '';

        if($balance > 0)
            $state = 'Ganancia';
        elseif($balance < 0)
            $state = 'Perdida';
        elseif($balance == 0 && ($incomeMonth != 0 && $expenseMonth != 0))
            $state = 'Punto de Equilibrio';
        else
            $state = 'Sin datos';

        return $state;
    }
}
