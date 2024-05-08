<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Movimiento;

class SolicitudesRepuestos extends Component
{
    
    public function render()
    {
        $solicitudes = Movimiento::query()
        ->whereNotNull('estado') // Solo registros con estado no nulo
        ->whereIn('estado', ['Pendiente', 'Repuesto pendiente']) // Solo registros con estado Pendiente o Repuesto pendiente
        ->get();
    

        return view('livewire.dashboard.solicitudes-repuestos', [
            'solicitudes' => $solicitudes
        ]);
    }

    public function aprobar($id){
        $registro = Movimiento::find($id);
        
        $registro->estado = 'Aprobado';
        $registro->save();

    }
    public function rechazar($id){
        $registro = Movimiento::find($id);
        $registro->estado = 'Rechazado';
        $registro->save();
    }
    public function esperar($id){
        $registro = Movimiento::find($id);
        $registro->estado = 'Repuesto pendiente';
        $registro->save();
    }
}
