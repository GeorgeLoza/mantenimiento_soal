<?php

namespace App\Livewire\OrdenesTrabajo\Generar;

use App\Models\Maquina;
use App\Models\Ubicacion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    //input
    public $fecha_sol;
    public $maquina_id;
    public $ubicacion_id;
    public $descripcion;

    //valores para cargar selects
    public $maquinas;
    public $ubicaciones;

    public function mount()
    {
     $this->maquinas = Maquina::all();
     $this->ubicaciones = Ubicacion::all();
    }

    public function render()
    {
        return view('livewire.ordenes-trabajo.generar.crear');
    }
}
