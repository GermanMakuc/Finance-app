@extends('layout.layout')

@section('title', 'Totales')

@section('content')
    @csrf

    <div class="row">

        @if (count($income) > 0)

            <div class="col-md-6">
                <h2>Ingresos Totales</h2>
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
                <h2>Egresos Totales</h2>
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

    <div class="card">
        <h5 class="card-header">Balance</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

@endsection
