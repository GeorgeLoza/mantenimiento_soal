<?php

namespace App\Livewire\Catalogo;

use App\Models\TipoOficio as ModelsTipoOficio;
use Livewire\Component;

class TipoOficio extends Component
{

    public $codigo, $oficio, $descripcion;

    public function render()
    {
        $oficios = ModelsTipoOficio::all();
        return view('livewire.catalogo.tipo-oficio', compact('oficios'));
    }

    public function save()
    {
        $this->validate([

            'codigo' => 'required',
            'oficio' => 'required',
            'descripcion' => 'required',

        ]);

        try {
            ModelsTipoOficio::create([
                'codigo' => $this->codigo,
                'oficio' => $this->oficio,
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
        $this->oficio = "";
        $this->descripcion = "";
    }

}
