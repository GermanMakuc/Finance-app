@extends('layout.layout')

@section('title', 'Editar Egreso')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form id="updateExpense" action="{{ route('expenses.update',  ['id' => $expense->id] ) }}" method="post">

            @csrf
            @include('expense.form')

            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3 vstack gap-2 mx-auto">
                        <input type="submit" name="btnUpdateExpense" class="btn btn-secondary btn-sm" value="Modificar">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3 vstack gap-2 mx-auto">
                        <input type="reset" class="btn btn-outline-secondary btn-sm" value="Cancelar">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
