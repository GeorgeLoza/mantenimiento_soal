<?php

namespace App\Livewire\Dashboard;

use App\Models\Orden;
use Livewire\Component;
use Livewire\Attributes\On;

class SolicitudesOrp extends Component
{
    
    #[On('actualizar_tabla_generar_ordenes')]
    public function render()
    {
        
        $ordenes = Orden::whereNull('user_id')->get();

        return view('livewire.dashboard.solicitudes-orp', [
            'ordenes' => $ordenes
        ]);
    }

}
