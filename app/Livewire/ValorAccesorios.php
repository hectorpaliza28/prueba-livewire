<?php

namespace App\Livewire;

use Livewire\Component;

class ValorAccesorios extends Component
{
    public $totalAccesorios = 0;

    public function render()
    {
        return view('livewire.valor-accesorios');
    }

    public function onBlurAgregarAccesoriosATotal(){

    }

    public function keyUpCalcularPagosPrecioFinal(){
        
    }
}
