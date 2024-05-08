<?php

namespace App\Livewire\OrdenesTrabajo\Misots;

use App\Models\Orden;
use Livewire\Component;
use App\Models\Solicitud;
use Livewire\Attributes\On;

class Tabla extends Component
{
    public $ots;
    
    #[On('actualizar_tabla_misots')]
    public function render()
    {
        $this->ots = Orden::where("user_id", auth()->user()->id)
            ->orderByRaw("FIELD(prioridad_id,'3', '2', '1')")
            ->whereHas('solicitud', function ($query) {
                $query->whereNot('estado','Completado');
            })
            ->get();

        return view('livewire.ordenes-trabajo.misots.tabla');
    }

    public function ejecutando($id)
    {
        $orp = Orden::where('id',$id)->first();
        $solicitud = Solicitud::where('id',$orp->solicitud_id)->first();
        $solicitud->estado = 'Ejecutando';
        $solicitud->save();
        
    }
    public function pause($id)
    {
        $orp = Orden::where('id',$id)->first();
        $solicitud = Solicitud::where('id',$orp->solicitud_id)->first();
        $solicitud->estado = 'Detenido';
        $solicitud->save();
        
    }
}
