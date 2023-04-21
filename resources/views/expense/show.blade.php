@extends('layout.layout')

@section('title', 'Ver Egreso')

@section('content')

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha del Monto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->amount_date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
