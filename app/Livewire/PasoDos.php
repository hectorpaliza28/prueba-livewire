<?php

namespace App\Livewire;

use Livewire\Component;

class PasoDos extends Component
{
    public $pagoContado = null;
    public $pagoMinimoQuince = null;
    public $pagoMinimo = null;
    public $margen = 5000;
    public $premium = true;
    

    public function mount(){

    }

    public function render()
    {
        return view('livewire.paso-dos')->layout('layouts.app');
    }

    public function guardarPlanPago(){

    }

    public function ingresaPagoContado(){
        if($this->pagoContado == null || $this->pagoContado == '' || $this->pagoContado == 0){
            $this->dispatchEvents(0.0, '', true);
            return;
        }

        if($this->pagoContado > $this->margen){
            $this->pagoContado = 0;
            return;
        }

        $this->flagPlanes = true;
        if(floatval($this->pagoContado) > 6000.0){
            $this->pagoMinimo = floatval($this->pagoContado * 0.50);
            $this->pagoMinimoQuince = $this->pagoMinimo;
            $this->dispatchEvents(floatval($this->pagoMinimo), '50', true, $this->pagoContado);
        }else{
            $minimoPorcentaje = $this->premium ? 0.15 : 0.30;
            $this->pagoMinimo = floatval($this->pagoContado * $minimoPorcentaje);
            $this->pagoMinimoQuince = floatval($this->pagoContado * 0.30);
            $this->dispatchEvents(floatval($this->pagoMinimo), $this->premium ? '15' : '30', false, $this->pagoContado);
        }

        $this->dispatch('calcularPagosPrecioFinal');
    }

    private function dispatchEvents($pagoInicial, $radioPorcentaje, $radiosFlag, $pagoContado = null){
        $this->dispatch('pagoInicial', $pagoInicial);
        $this->dispatch('radioPorcentaje', $radioPorcentaje);
        $this->dispatch('radiosFlag', $radiosFlag);
        $this->dispatch('minimoQuince', $this->pagoMinimoQuince);

        if($pagoContado != null){
            $this->dispatch('pagoContado', $pagoContado);
        }
    }

    public function limpiarSeleccionPlan(){
        $this->dispatch('limpiarSeleccionPlan', null);
    }
}
