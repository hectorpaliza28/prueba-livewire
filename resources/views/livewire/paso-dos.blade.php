<div>
    <div class="col-md-9">
        {{-- The whole world belongs to you. --}}
        <div class="card">
            <div class="card-header">Cotizador
                <button class="btn btn-sm btn-success float-right">Modelos compatibles</button>
            </div>
    
            <div class="card-body">
                <div style="padding-left:10px; padding-right:10px;">
                    <form action="" class="form-group">
                        <p style="color: gray">El simulador es un aproximado, el pago inicial y el interés puden variar de acuerdo a la evauación del cliente y si ha tenido anteriormente créditos en Credibasic</p>
                        <div class="row">
                            <div class="form-group" style="width: 47%">
                                <label class="col-form-label-lg">Precio al contado (incluyendo IVA)</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Margen de credito: $5000" wire:model='pagoContado' wire:keyup.debounce.800ms='ingresaPagoContado'>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="width: 47%; margin-left: 2em;">
                                <livewire:radios-porcentajes :premium="$premium" :pago_contado="$pagoContado" :pago_minimo_quince="$pagoMinimoQuince"/>
                            </div>
    
    
                            <livewire:valor-accesorios />
                            
                            @if($pagoContado && $pagoContado > 0)
                                <livewire:seleccionar-plan />
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 