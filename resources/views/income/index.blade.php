@extends('layout.layout')

@section('title', 'Ingresos')

@section('content')
@csrf
    @if (count($income) > 0)

    <div class="row">
        <div class="col-md-6">
            <h2>Ingresos Mensuales</h2>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($income as $value)
                        <tr>
                            <th scope="row">#{{ $value->id }}</th>
                            <td>${{ $value->amount }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                <a name="showIncome" href="{{ route('income.show',  ['id' => $value->id] ) }}" class="btn btn-secondary">
                                    <i class="bi bi-search"></i>
                                </a>
                                <a name="editIncome" href="{{ route('income.edit',  ['id' => $value->id] ) }}" class="btn btn-secondary">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <button name="deleteIncome" data-id="{{ $value->id }}" type="button" class="btn btn-secondary">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @else

    @endif

@endsection
