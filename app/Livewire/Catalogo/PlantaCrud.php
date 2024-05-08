<?php

namespace App\Livewire\Catalogo;

use App\Models\Planta;
use Livewire\Component;

class PlantaCrud extends Component
{

    public $codigo, $nombre, $descripcion;

    public function render()
    {
        $plantas = Planta::all();

        return view('livewire.catalogo.planta-crud', compact('plantas'));
    }

    public function save()
    {
        $this->validate([

            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',

        ]);

        try {
            Planta::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'descripcion'  => $this->descripcion,
            ]);

            $this->vaciarInput();
           

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function vaciarInput()
    {
        $this->codigo = "";
        $this->nombre = "";
        $this->descripcion = "";
    }
}
