<?php

namespace App\Livewire\OrdenesTrabajo\Solicitud;

use App\Models\Maquina;
use Livewire\Component;
use App\Models\Solicitud;
use App\Models\Ubicacion;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    //variable id para consulta 
    public $id;

    //input

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

        $solicitud = Solicitud::where('id', $this->id)->first();

        $this->maquina_id = $solicitud->maquina_id;
        $this->ubicacion_id = $solicitud->ubicacion_id;
        $this->descripcion = $solicitud->descripcion;
    }

    public function render()
    {
        return view('livewire.ordenes-trabajo.solicitud.editar');
    }

    public function update()
    {
        
        $this->validate([
            'maquina_id'=> 'required',
            'ubicacion_id'=> 'required',
            'descripcion'=> 'required',
        ]);
        try {
            
            $solicitud = Solicitud::find($this->id);
            $solicitud->maquina_id = $this->maquina_id;
            $solicitud->ubicacion_id = $this->ubicacion_id;
            $solicitud->descripcion = $this->descripcion;
            $solicitud->save();
            

            $this->dispatch('actualizar_tabla_solicitud_ordenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud actualizada exitosamente');
            
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }

}
