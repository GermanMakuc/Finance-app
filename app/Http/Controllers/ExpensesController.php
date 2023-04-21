<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense.create');
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
            Expenses::create($data);

            return response()->json([
                'state' => true,
                'message' => 'Se ha ingresado satisfactoriamente.'
            ]);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expense =  Expenses::findOrFail($id);
        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expense =  Expenses::findOrFail($id);
        return view('expense.edit', compact('expense'));
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
            Expenses::findOrFail($id)->update($data);

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
        $expense =  Expenses::findOrFail($id);
        if($expense->delete())
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
