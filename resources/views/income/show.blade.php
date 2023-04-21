@extends('layout.layout')

@section('title', 'Ver Ingreso')

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
                    <td>{{ $income->id }}</td>
                    <td>{{ $income->amount }}</td>
                    <td>{{ $income->amount_date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
