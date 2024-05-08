<?php

namespace App\Livewire\OrdenesTrabajo\Solicitud;

use App\Models\Solicitud;
use Livewire\Component;

use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{
    public $id;
    public function render()
    {
        return view('livewire.ordenes-trabajo.solicitud.eliminar');
    }
    public function delete()
    {
        try {
            Solicitud::find($this->id)->delete();
            $this->dispatch('actualizar_tabla_solicitud_ordenes');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se Elimino la solicitud exitosamente');
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
