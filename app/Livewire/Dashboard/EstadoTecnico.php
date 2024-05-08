<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class EstadoTecnico extends Component
{
    public $tecnicosUusarios;

    public function mount()
    {
        $this->tecnicosUusarios = User::with(['orden' => function ($query) {
            $query->whereHas('solicitud', function ($q) {
                $q->where('estado', 'Ejecutando'); // Asumiendo que 'nombre' es el campo que determina el estado
            });
        }])
        ->where('rol', 'Tecnico')
        ->get();
        
    }

    
        public $consulta = 'Ejecutando'; // Estado inicial de la consulta
    
        public function cambiarConsulta($estado)
        {
            $this->consulta = $estado;
        }
    
        public function render()
        {
            $tecnicos = User::where('rol', 'Tecnico')
                ->whereHas('orden', function ($query) {
                    $query->whereHas('solicitud', function ($query) {
                        $query->where('estado', $this->consulta);
                    });
                })
                ->with(['orden' => function ($query) {
                    $query->whereHas('solicitud', function ($query) {
                        $query->where('estado', $this->consulta);
                    });
                }])
                ->get();
            
        return view('livewire.dashboard.estado-tecnico', [
            'tecnicos' => $tecnicos,
        ]);
    }
}
