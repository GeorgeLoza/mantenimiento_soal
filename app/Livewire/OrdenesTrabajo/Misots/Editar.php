<?php

namespace App\Livewire\OrdenesTrabajo\Misots;

use App\Models\Movimiento;
use App\Models\Orden;
use Livewire\Component;
use App\Models\Repuesto;
use App\Models\Solicitud;
use LivewireUI\Modal\Modal;
use App\Models\TiempoTrabajo;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{

    public $id;
    public $solicitud;
    public $generar;

    public $accionTomada;
    public $diagnostico;

    public $tiempo_inicio;
    public $tiempo_fin;

    public $ots;
    public $repuestos;
    public $repuestos_search = null;

    public $repuesto_id;
    public $cantidad;

    public $repuestosSolicitud;

    // datos extras
    public $tiempos;

    public function mount()
    {

        $orden = Orden::where('id', $this->id)->firstOrFail();

        $this->accionTomada = $orden->accionTomada;
        $this->diagnostico = $orden->diagnostico;


        $this->tiempos = TiempoTrabajo::where('orden_id', $this->id)->get();
        $this->repuestosSolicitud = Movimiento::where('orden_id', $this->id)->get();

        $this->solicitud = Solicitud::where('id', $orden->solicitud_id)->first();
    }

    public function render()
    {
        $this->repuestos = Repuesto::where('nombre', 'like', '%' . $this->repuestos_search . '%')->get();
        return view('livewire.ordenes-trabajo.misots.editar');
    }

    public function addhour()
    {

        $this->validate([

            'tiempo_inicio' => 'required',
            'tiempo_fin' => 'required',

        ]);

        try {

            TiempoTrabajo::create([
                'orden_id' => $this->id,
                'tiempo_inicio' => $this->tiempo_inicio,
                'tiempo_fin' => $this->tiempo_fin,
            ]);

            $this->tiempo_inicio = "";
            $this->tiempo_fin = "";

            // Actualiza la colección de tiempos
            $this->tiempos = TiempoTrabajo::where('orden_id', $this->id)->get();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteHour($tiempoId)
    {
        try {
            TiempoTrabajo::find($tiempoId)->delete();
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }

    public function addrepuesto()
    {

        $this->validate([

            'repuesto_id' => 'required',
            'cantidad' => 'required',

        ]);

        try {

            Movimiento::create([
                'orden_id' => $this->id,
                'repuestos_id' => $this->repuesto_id,
                'cantidad' => $this->cantidad,
                'estado' => 'Pendiente',
                'movimiento' => 'ot',
            ]);

            $this->repuesto_id = "";
            $this->cantidad = "";

            // Actualiza la colección de tiempos
            $this->repuestosSolicitud = Movimiento::where('orden_id', $this->id)->get();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function deleteRepuesto($repuestoId)
    {
        try {
            Movimiento::find($repuestoId)->delete();
            // Actualiza la colección de tiempos
            $this->repuestosSolicitud = Movimiento::where('orden_id', $this->id)->get();
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
    public function update()
    {
        $this->validate([
            'accionTomada' => 'required',
            'diagnostico' => 'required',
        ]);

        try {
            $orden = Orden::findOrFail($this->id);

            $orden->accionTomada = $this->accionTomada;
            $orden->diagnostico = $this->diagnostico;
            $orden->save();

            $solicitud = Solicitud::findOrFail($orden->solicitud_id);
            $solicitud->estado =  'Completado';         
            $solicitud->save();

            $this->dispatch('actualizarTablaGenerarOrdenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud realizada exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
}
