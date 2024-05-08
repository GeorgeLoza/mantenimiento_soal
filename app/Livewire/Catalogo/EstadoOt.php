<?php

namespace App\Livewire\Catalogo;

use App\Models\EstadoOt as ModelsEstadoOt;
use Livewire\Component;

class EstadoOt extends Component
{

    public $codigo, $estado_ot, $descripcion;
    public function render()
    {
        $estado_ots = ModelsEstadoOt::all();
        return view('livewire.catalogo.estado-ot', compact('estado_ots'));
    }

    public function save()
    {
        $this->validate([

            'codigo' => 'required',
            'estado_ot' => 'required',
            'descripcion' => 'required',
        ]);

        try {
            ModelsEstadoOt::create([

                'codigo' => $this->codigo,
                'estado_ot' => $this->estado_ot,
                'descripcion' => $this->descripcion,

            ]);
            $this->vaciarInput();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function vaciarInput()
    {
        $this->codigo = "";
        $this->estado_ot = "";
        $this->descripcion = "";
    }
}
