@extends('layout.layout')

@section('title', 'Agregar Egresos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form id="addExpense" action="{{ route('expenses.store') }}" method="post">

            @csrf
            @include('expense.form')

            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3 vstack gap-2 mx-auto">
                        <input type="submit" name="btnAddExpense" class="btn btn-secondary btn-sm" value="Agregar">
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
