<?php

namespace App\Livewire\OrdenesTrabajo\Generar;

use App\Models\EstadoOt;
use App\Models\Maquina;
use App\Models\Orden;
use App\Models\Prioridad;
use App\Models\Solicitud;
use App\Models\TipoOrden;
use App\Models\Ubicacion;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    //variable id para consulta 
    public $id;
    public $solicitud;
    public $generar;

    //input

    public $maquina_id;
    public $ubicacion_id;
    public $prioridad_id;
    public $tipo_ordens_id;
    public $estado_ots_id;

    public $user_id;
    public $fecha_sol;
    public $fecha_gen;
    public $notasTec;
    public $diagnostico;
    public $accionTomada;
    public $descripcion;

    //valores para cargar selects
    public $maquinas;
    public $ubicaciones;
    public $prioridades;
    public $tipoOrdenes;
    public $estadoOts;
    public $usuarios;

    public function mount()
    {

        $this->maquinas = Maquina::all();
        $this->ubicaciones = Ubicacion::all();
        $this->prioridades = Prioridad::all();
        $this->tipoOrdenes = TipoOrden::all();
        $this->estadoOts = EstadoOt::all();
        $this->usuarios = User::all();

        $orden = Orden::findOrFail($this->id);

        $this->solicitud = Solicitud::where('id', $orden->solicitud_id)->first();

        $this->maquina_id = $this->solicitud->maquina_id;
        $this->ubicacion_id = $this->solicitud->ubicacion_id;
        $this->descripcion = $this->solicitud->descripcion;

        $this->generar = Orden::where('id', $orden->id)->first();
        $this->user_id = $this->generar->user_id;
        $this->prioridad_id = $this->generar->prioridad_id;
        $this->tipo_ordens_id = $this->generar->tipo_ordens_id;
        $this->notasTec = $this->generar->notasTec;
    }


    public function render()
    {


        return view('livewire.ordenes-trabajo.generar.editar');
    }

    public function update()
    {
        $ultimaOT = Orden::whereNotNull('user_id')->latest()->first();

        $this->validate([
            'ubicacion_id' => 'required',
            'descripcion' => 'required',
            'tipo_ordens_id' => 'required',
            'prioridad_id' => 'required',
            'user_id' => 'required',
        ]);

        try {

            $orden = Orden::find($this->id);
            $orden->user_id = $this->user_id;
            $orden->prioridad_id = $this->prioridad_id;
            $orden->tipo_ordens_id = $this->tipo_ordens_id;
            $orden->estado_ots_id = 1;
            $orden->notasTec = $this->notasTec;
            if ($orden->numero_orden == NULL) {
                $orden->numero_orden = $ultimaOT->numero_orden + 1;
            }
            $orden->save();

            $soli = Solicitud::find($orden->solicitud_id);
            $soli->ubicacion_id = $this->ubicacion_id;
            $soli->maquina_id = $this->maquina_id;
            $soli->descripcion = $this->descripcion;
            $soli->estado = "Asignado";
            $soli->save();


            $this->dispatch('actualizar_tabla_generar_ordenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud actualizada exitosamente');
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }

    public function rechazar()
    {
        try {

            $orden = Orden::find($this->id);

            $orden->save();

            $soli = Solicitud::find($orden->solicitud_id);

            $soli->estado = "Rechazado";
            $soli->save();


            $this->dispatch('actualizar_tabla_generar_ordenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud Rechazado');
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
}
