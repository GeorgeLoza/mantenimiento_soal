<?php

namespace App\Livewire\Catalogo;

use App\Models\TipoOrden as ModelsTipoOrden;
use Livewire\Component;

class TipoOrden extends Component
{
    public $codigo, $tipo_orden, $descripcion;
    
    public function render()
    {
        $ordenestipos = ModelsTipoOrden::all();
        return view('livewire.catalogo.tipo-orden', compact('ordenestipos'));
    }

    public function save()
    {
        $this-> validate([

            'codigo' => 'required',
            'tipo_orden' => 'required',
            'descripcion' => 'required',
        ]);

        try{
            ModelsTipoOrden::create([

                'codigo' => $this->codigo,
                'tipo_orden' => $this->tipo_orden,
                'descripcion' => $this->descripcion,

            ]);
        }catch (\Throwable $th) {
            dd($th);
        }
    }

    public function vaciarInput()
    {
        $this->codigo = "";
        $this->tipo_orden = "";
        $this->descripcion = "";
    }

}
