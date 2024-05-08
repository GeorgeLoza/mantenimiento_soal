<?php

namespace App\Livewire\OrdenesTrabajo\Misots;

use App\Models\Orden;
use App\Models\Maquina;
use Livewire\Component;
use App\Models\Solicitud;
use App\Models\Ubicacion;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //input
    public $user_id;
    public $maquina_id;
    public $ubicacion_id;
    public $descripcion;
    public $solicitante_id;

    // Valores para cargar selects
    public $maquinas = [];
    public $ubicaciones;
    public $solicitantes;




    public function mount()
    {
        $this->ubicaciones = Ubicacion::all();
        $this->solicitantes = User::where('rol', 'solicitante')->get();
    }


    public function render()
    {
        $this->maquinas = $this->ubicacion_id ? Maquina::where('ubicacion_id', $this->ubicacion_id)->get() : [];
        return view('livewire.ordenes-trabajo.misots.crear');
    }

    public function save()
    {

        $this->validate([
            'ubicacion_id' => 'required',
            'descripcion' => 'required',
        ]);
        try {

            $ultimaOT = Orden::whereNotNull('user_id')->latest()->first();

            $soli = Solicitud::create([
                'user_id' => $this->solicitante_id,
                'fecha_sol' => now(),
                'maquina_id' => $this->maquina_id,
                'ubicacion_id' => $this->ubicacion_id,
                'descripcion' => $this->descripcion,
                'estado' => 'Pendiente',
            ]);

            $id = $soli->id;

            Orden::create([
                'solicitud_id' => $id,
                'user_id' => auth()->user()->id,
                'prioridad_id' => 4,
                'numero_orden' => $ultimaOT->id + 1,
            ]);

            $this->dispatch('actualizar_tabla_misots');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud realizada exitosamente');
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
}
