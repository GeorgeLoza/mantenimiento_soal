<?php

namespace App\Livewire\Catalogo;

use App\Models\TipoMaq as ModelsTipoMaq;
use Livewire\Component;

class TipoMaq extends Component
{

    public $codigo, $nombre, $descripcion;

    public function render()
    {
        $tipomaquinas = ModelsTipoMaq::all();
        
        return view('livewire.catalogo.tipo-maq', compact('tipomaquinas'));
    }

    public function save()
    {
        $this->validate([

            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',

        ]);

        try {
            ModelsTipoMaq::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
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
        $this->nombre = "";
        $this->descripcion = "";
    }
}
