<div>
        <label for="" class="col-form-label-lg">Pago inicial</label>
        @if($premium)
            <label for="porcentaje" style="margin-left: 15px;">15%</label>
            <input type="radio" name="porcentaje" value="15" @if($radiosFlag) disabled @endif wire:model="radioPorcentaje" wire:change='aplicarDescuento'>
        @endif
        
        <label for="porcentaje" style="margin-left: 5px;">20%</label>
        <input type="radio" name="porcentaje" value="20" @if($radiosFlag) disabled @endif wire:model="radioPorcentaje" wire:change='aplicarDescuento'>

        <label for="porcentaje" style="margin-left: 5px;">30%</label>
        <input type="radio" name="porcentaje" value="30" @if($radiosFlag) disabled @endif wire:model="radioPorcentaje" wire:change='aplicarDescuento'>

        <label for="porcentaje" style="margin-left: 5px;">50%</label>
        <input type="radio" name="porcentaje" value="50" @if($radiosFlag) disabled @endif wire:model="radioPorcentaje" wire:change='aplicarDescuento'>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                </div>
                <input type="number" class="form-control form-control-lg" step="100" id="pago_inicial" disabled wire:model="pagoInicial">
                <div class="input-group-append">
                    <a id="pinicialdown" class="input-group-text btn btn-primary" wire:click="modificarPago(1)">-</a>
                    <a id="pinicialup" class="input-group-text btn btn-primary" wire:click="modificarPago(2)">+</a>
                </div>
            </div>
        </div>
</div>
