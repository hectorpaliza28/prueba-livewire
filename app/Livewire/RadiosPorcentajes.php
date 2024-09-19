<?php

namespace App\Livewire;

use Livewire\Component;

class RadiosPorcentajes extends Component
{
    public $premium;
    public $pago_contado;
    public $pagoMinimoQuince;
    public $radiosFlag = true;
    public $radioPorcentaje = null;
    public $pagoInicial = 0;

    protected $listeners = [
        'pagoInicial' => 'recibirPagoInicial',
        'radioPorcentaje' => 'recibirRadioPorcentaje',
        'radiosFlag' => 'toggleRadiosFlag',
        'minimoQuince' => 'recibirPagoMinimoQuince'
    ];

    //LISTENERS
    public function recibirPagoInicial($pagoInicial){
        $this->pagoInicial = $pagoInicial;
    }

    public function recibirRadioPorcentaje($radioPorcentaje){
        $this->radioPorcentaje = $radioPorcentaje;
    }

    public function toggleRadiosFlag($flag){
        $this->radiosFlag = $flag;
    }
    
    public function recibirPagoMinimoQuince($pagoMinimoQuince){
        $this->pagoMinimoQuince = $pagoMinimoQuince;
    }
    //LISTENERS

    public function mount($premium, $pago_contado){
        $this->premium = $premium;
        $this->pago_contado = $pago_contado;
        $this->pagoMinimoQuince = 0.0;
    }

    public function render()
    {
        return view('livewire.radios-porcentajes');
    }

    public function aplicarDescuento(){
        switch($this->radioPorcentaje){
            case '15':
                $this->pagoInicial = floatval($this->pago_contado * 0.15);
                break;
            case '20':
                $this->pagoInicial = floatval($this->pago_contado * 0.20);
                break;
            case '30':
                $this->pagoInicial = floatval($this->pago_contado * 0.30);
                break;
            case '50':
                $this->pagoInicial = floatval($this->pago_contado * 0.50);
                break;
        }
    }

    public function modificarPago($opcion){
        $this->pagoInicial = floatval($this->pagoInicial);

        switch($opcion){
            case 1:
                $nuevo_pago = $this->pagoInicial - 100;
                $this->pagoInicial = ($nuevo_pago > $this->pagoMinimoQuince) ? $this->pagoInicial - 100
                                                                               : $this->pagoMinimoQuince;
                break;
            
            case 2:
                $pago = $this->pagoInicial + 100;
                $this->pagoInicial = ($pago < $this->pago_contado) ? $this->pagoInicial + 100
                                                                   : $this->pago_contado;
                break;
        }

        //$this->emit('calcularPagosPrecioFinal', $this->pagoInicial);
    }
}
