<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="amount" class="form-label">Ingresa el Monto del egreso</label>
            <input id="amount" type="number" name="amount" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa el Monto" @isset($expense) value="{{ $expense->amount }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="amount_date" class="form-label">Ingresa la Fecha del egreso</label>
            <input id="amount_date" type="date" name="amount_date" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa la Fecha" @isset($expense) value="{{ $expense->amount_date }}" @endisset>
        </div>
    </div>
</div>
