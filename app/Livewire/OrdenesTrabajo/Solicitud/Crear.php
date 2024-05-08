<?php

namespace App\Livewire\OrdenesTrabajo\Solicitud;

use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\UbicacionController;
use App\Livewire\OrdenesTrabajo\SolicitudCrud;
use App\Models\Maquina;
use App\Models\Orden;
use App\Models\Solicitud;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Ubicacion;

class Crear extends ModalComponent
{
     //input
     public $fecha_sol;
     public $maquina_id;
     public $ubicacion_id;
     public $descripcion;

    // Valores para cargar selects
    public $maquinas = [];
    public $ubicaciones;


   

     public function mount()
     {
      $this->ubicaciones = Ubicacion::all();
     }


    public function render()
    {
        $this->maquinas = $this->ubicacion_id ? Maquina::where('ubicacion_id',$this->ubicacion_id)->get() : [];
        return view('livewire.ordenes-trabajo.solicitud.crear');
    }

    public function save()
    {
        
        $this->validate([
            'ubicacion_id'=> 'required',
            'descripcion'=> 'required',
        ]);
        try {
            
            $soli = Solicitud::create([
            'user_id'=> auth()->user()->id,
            'fecha_sol'=> now(),
            'maquina_id'=> $this->maquina_id,
            'ubicacion_id'=> $this->ubicacion_id,
            'descripcion'=> $this->descripcion,
            'estado'=> 'Pendiente',
            ]);

            $id = $soli->id;

            Orden::create([
                'solicitud_id'=> $id,
            ]);

              $this->dispatch('actualizar_tabla_solicitud_ordenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud realizada exitosamente');
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
}
