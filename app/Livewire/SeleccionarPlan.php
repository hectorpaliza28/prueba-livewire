<?php

namespace App\Livewire;

use Livewire\Component;

class SeleccionarPlan extends Component
{
    protected $listeners = [
        'calcularPagosPrecioFinal' => 'calcularPagosPrecioFinal',
        'pagoInicial' => 'recibirPagoInicial',
        'pagoContado' => 'recibirPagoContado',
    ];

    public $pagoContado = null;
    public $pagoInicial = null;
    public $data = [
        [
            'id_plan' => 1,
            'semanas' => 48,
            'meses' => 12,
            'precio_semana' => 0.0,
            'precio_total' => 0.0,
            'seleccionado' => false,
            'show' => true
        ],
        [
            'id_plan' => 2,
            'semanas' => 36,
            'meses' => 9,
            'precio_semana' => 0.0,
            'precio_total' => 0.0,
            'seleccionado' => false,
            'show' => true
        ],
        [
            'id_plan' => 3,
            'semanas' => 24,
            'meses' => 6,
            'precio_semana' => 0.0,
            'precio_total' => 0.0,
            'seleccionado' => false,
            'show' => true
        ],
        [
            'id_plan' => 4,
            'semanas' => 12,
            'meses' => 3,
            'precio_semana' => 0.0,
            'precio_total' => 0.0,
            'seleccionado' => false,
            'show' => true
        ]
    ];
    public $planesArray;

    //LISTENERS
    public function recibirPagoInicial($pagoInicial){
        $this->pagoInicial = $pagoInicial;
    }
    public function recibirPagoContado($pagoContado){
        $this->pagoContado = $pagoContado;
    }
    //LISTENERS


    public function mount(){
        $this->planesArray = array_map(function($item){
            return (object)$item;
        }, $this->data);
    }
    
    public function render()
    {
        return view('livewire.seleccionar-plan');
    }

    public function calcularPagosPrecioFinal(){
        foreach($this->planesArray as $key => $plan){
            switch($key){
                case 0:
                    $plan->precio_semana = ceil((floatval($this->pagoContado * 1.8) - $this->pagoInicial) / 48);
                    $plan->precio_total = ceil($this->pagoContado * 1.8);
                    break;
                case 1:
                    $plan->precio_semana = ceil((floatval($this->pagoContado * 1.7) - $this->pagoInicial) / 36);
                    $plan->precio_total = ceil($this->pagoContado * 1.7);
                    break;
                case 2:
                    $plan->precio_semana = ceil((floatval($this->pagoContado * 1.6) - $this->pagoInicial) / 24);
                    $plan->precio_total = ceil($this->pagoContado * 1.6);
                    break;
                case 3:
                    $plan->precio_semana = ceil((floatval($this->pagoContado * 1.5) - $this->pagoInicial) / 12);
                    $plan->precio_total = ceil($this->pagoContado * 1.5);
                    break;
            }
        }
    }
}
