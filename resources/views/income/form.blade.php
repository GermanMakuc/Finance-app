<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="amount" class="form-label">Ingresa el Monto</label>
            <input id="amount" type="number" name="amount" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa el Monto" @isset($income) value="{{ $income->amount }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="amount_date" class="form-label">Ingresa la Fecha</label>
            <input id="amount_date" type="date" name="amount_date" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa el Mes" @isset($income) value="{{ $income->amount_date }}" @endisset>
        </div>
    </div>
</div>
