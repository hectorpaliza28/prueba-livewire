<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="form-group">
        <label class="col-form-label-lg">Plazos de pago</label>

        <div class="form-group">
            <div class="input-group mb-3">
                <div style="width: 100%">
                    @foreach($planesArray as $key => $plan)
                        @if($plan->show)
                            <label class="card" wire:click='seleccionarPlan($plan, $key)'>
                                <input type="radio" name="plan" class="radio" checked hidden>

                                <span class="plan-details">
                                    <div class="row" style="padding: 15px;">
                                        <span class="plan-type">{{$plan->semanas}} semanas</span>
                                        <span class="plan-meses">{{$plan->meses}} meses</span>

                                        <div class="container" style="width: 35%; margin-top: -50px; align-content: right;">
                                            <div class="float-right">
                                                <span class="plan-type">$<a id="pago_sem_48">{{$plan->precio_semana}}</a> <a style="font-size:20px;">/semana</a> </span>

                                                <span class="plan-preciofinal" >
                                                    Precio final $ <a id="precio_final_48">{{$plan->precio_total}}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </label>
                            <br>

                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <a id="siguiente" class="btn btn-block btn-lg btn-primary" style="color: #fff" wire:click='guardarPlanPago()'>Siguiente</a>
    </div>
</div>
