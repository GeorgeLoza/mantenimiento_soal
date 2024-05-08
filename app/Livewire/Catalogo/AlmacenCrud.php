<?php

namespace App\Livewire\Catalogo;

use App\Models\Almacen;
use Livewire\Component;


class AlmacenCrud extends Component
{
    public $nombre, $lugar, $planta_id, $user_id;

    public $mensajeExito;
    public $mensajeError;

    public function render()
    {
        $almacenes = Almacen::all();
        return view('livewire.catalogo.almacen-crud', compact('almacenes'));
    }

    public function save()
    {

        $this->validate([
            
        'nombre' => 'required',
        'lugar' => 'required',       
       
        ]);

        try{
            Almacen::create([

                'nombre' => $this->nombre,
                'lugar' => $this->lugar,

            ]);

            $this->mensajeExito = '¡Registro guardado con éxito!';
            $this->mensajeError = null; // Asegúrate de borrar el mensaje de error
            $this->vaciarInput();
        }catch (\Throwable $th) {
            $this->mensajeError = 'Error al guardar el registro: ' . $th->getMessage();
            $this->mensajeExito = null; // Asegúrate de borrar el mensaje de éxito
            
        }
        
        
    }
    public function vaciarInput()
    {
        $this->nombre = "";
        $this->lugar = "";
    }
}