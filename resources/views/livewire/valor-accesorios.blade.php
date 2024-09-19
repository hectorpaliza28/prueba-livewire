<div class="form-group" style="width: 47%;">
        <div class="input-group mb-3">
            <span class="input-group-text">Valor de accesorios (máximo $300)</span>
        </div>
        <input type="number" name="accesorios" max="300" min="1" id="accesorios2" class="form-control form-control-lg" wire:model="totalAccesorios" wire:keyup.debounce.800ms='onBlurAgregarAccesoriosATotal'>
</div>
