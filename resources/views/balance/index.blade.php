@extends('layout.layout')

@section('title', 'Totales')

@section('content')
    @csrf

    <div class="row">

        @if (count($income) > 0)

            <div class="col-md-6">
                <h3>Ingresos Totales</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($income as $value)
                            <tr>
                                <th scope="row">#{{ $value->id }}</th>
                                <td>${{ $value->amount }}</td>
                                <td>{{ $value->amount_date }}</td>
                                <td>
                                    <a name="showIncome" href="{{ route('income.show', ['id' => $value->id]) }}"
                                        class="btn btn-secondary">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    <a name="editIncome" href="{{ route('income.edit', ['id' => $value->id]) }}"
                                        class="btn btn-secondary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <button name="deleteIncome" data-id="{{ $value->id }}" type="button"
                                        class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-6">
                <h2>Aviso</h2>
                <div class="alert alert-danger" role="alert">
                    No se ha agregado ningún ingreso aún
                </div>
            </div>

        @endif

        @if (count($expenses) > 0)

            <div class="col-md-6">
                <h3>Egresos Totales</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $value)
                            <tr>
                                <th scope="row">#{{ $value->id }}</th>
                                <td>${{ $value->amount }}</td>
                                <td>{{ $value->amount_date }}</td>
                                <td>
                                    <a name="showExpense" href="{{ route('expenses.show', ['id' => $value->id]) }}"
                                        class="btn btn-secondary">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    <a name="editExpense" href="{{ route('expenses.edit', ['id' => $value->id]) }}"
                                        class="btn btn-secondary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <button name="deleteExpense" data-id="{{ $value->id }}" type="button"
                                        class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-6">
                <h2>Aviso</h2>
                <div class="alert alert-danger" role="alert">
                    No se ha agregado ningún egreso aún
                </div>
            </div>

        @endif

    </div>

    <div class="col">
        <div class="col-md-12">
            <h3>Reporte Mensual</h3>
            <div class="card-group">
                <div class="card text-center">
                    <h5 class="card-header">Mes</h5>
                    <div class="card-body">
                        <select id="selectMonth" class="form-select form-select-lg mb-3">
                            <option selected>Selecciona un Mes</option>
                            @foreach ($monthArr as $month => $value)
                                <option value="{{ $month + 1 }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card text-center">
                        <h5 class="card-header">Balance</h5>
                        <table class="table table-borderless">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Ingresos</th>
                                    <th scope="col">Egresos</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="incomeTotal">$0</td>
                                    <td id="expenseTotal">$0</td>
                                    <td id="balanceTotal">$0</td>
                                    <td id="stateTotal">No seleccionado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
