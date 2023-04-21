<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="amount" class="form-label">Ingresa el Monto del ingreso</label>
            <input id="amount" type="number" name="amount" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa el Monto" @isset($income) value="{{ $income->amount }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="amount_date" class="form-label">Ingresa la Fecha del ingreso</label>
            <input id="amount_date" type="date" name="amount_date" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa la fecha" @isset($income) value="{{ $income->amount_date }}" @endisset>
        </div>
    </div>
</div>
