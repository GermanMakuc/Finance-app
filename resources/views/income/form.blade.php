<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="amount" class="form-label">Ingresa el Monto</label>
            <input id="amount" type="number" name="amount" class="form-control form-control-lg" aria-label=""
            placeholder="Ingresa el Monto" @isset($income) value="{{ $income->amount }}" @endisset>
        </div>
    </div>
</div>
