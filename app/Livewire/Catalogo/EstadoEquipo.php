<?php

namespace App\Livewire\Catalogo;

use App\Models\EstadoEquipo as ModelsEstadoEquipo;
use Livewire\Component;

class EstadoEquipo extends Component
{
    public $codigo, $estado, $descripcion;
    
    public function render()
    {
        $estadoequipos = ModelsEstadoEquipo::all();
        return view('livewire.catalogo.estado-equipo', compact('estadoequipos'));
    }

    public function save()
    {

        $this->validate([

            'codigo'  => 'required',
            'estado' => 'required',
            'descripcion' => 'required',

        ]);

        try{

            ModelsEstadoEquipo::create([
                'codigo' => $this -> codigo,
                'estado' => $this -> estado,
                'descripcion' => $this -> descripcion,
            ]);

            $this->vaciarInput();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function vaciarInput()
    {
        $this->codigo  ="";
        $this->estado  ="";
        $this->descripcion  ="";
    }

}
