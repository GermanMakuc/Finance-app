<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $income = Income::get();
        $expenses = Expenses::get();

        return view('income.index', compact('income', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : JsonResponse
    {

        $errorString = $this->getErrors($request);

        if(!is_null($errorString))
        {
            return response()->json([
                'state' => false,
                'message' => $errorString
           ]);
        }
        else
        {

            $data = $request->all();
            Income::create($data);

            return response()->json([
                'state' => true,
                'message' => 'Se ha ingresado satisfactoriamente.'
            ]);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id) : JsonResponse
    {
        $income =  Income::findOrFail($id);
        return response()->json(['obj' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $income =  Income::findOrFail($id);
        return view('income.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : JsonResponse
    {
        $errorString = $this->getErrors($request);

        if(!is_null($errorString))
        {
            return response()->json([
                'state' => false,
                'message' => $errorString
           ]);
        }
        else
        {

            $data = $request->all();
            Income::findOrFail($id)->update($data);

            return response()->json([
                'state' => true,
                'message' => 'Se ha modificado satisfactoriamente.'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : JsonResponse
    {
        $income =  Income::findOrFail($id);
        if($income->delete())
        {
            return response()->json([
                'state' => true,
                'message' => 'El registro ha sido eliminado.'
            ]);
        }

    }

    public function getErrors(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'amount_date' => 'required|date'
        ]);

        $errorString = null;

        if ($validator->fails()) {

            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                $errorString = $message;
            }

            return $errorString;
        }
    }
}
