<?php

namespace App\Livewire\Catalogo;

use App\Models\Planta;
use Livewire\Component;
use App\Models\Prioridad as PrioridadModel;

class Prioridad extends Component
{

    public $codigo, $prioridad, $descripcion;

    public function render()
    {
        $prioridads = PrioridadModel::all();

        return view('livewire.catalogo.prioridad', compact('prioridads'));
    }

    public function save()
    {
        $this->validate([

            'codigo' => 'required',
            'prioridad' => 'required',
            'descripcion' => 'required',

        ]);

        try {
            PrioridadModel::create([
                'codigo' => $this->codigo,
                'prioridad' => $this->prioridad,
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
        $this->prioridad = "";
        $this->descripcion = "";
    }
}
