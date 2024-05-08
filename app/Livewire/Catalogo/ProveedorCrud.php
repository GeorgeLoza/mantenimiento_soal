<?php

namespace App\Livewire\Catalogo;

use App\Models\Almacen;
use App\Models\Proveedor;
use Livewire\Component;


class ProveedorCrud extends Component
{
    public $nombre, $direccion, $telefono, $encargado;

    public $mensajeExito;
    public $mensajeError;

    public function render()
    {
        $proveedors = Proveedor::all();
        return view('livewire.catalogo.proveedor-crud', compact('proveedors'));
    }

    public function save()
    {

        $this->validate([

            'nombre' => 'required',

        ]);

        try {
            Proveedor::create([

                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'encargado' => $this->encargado,
            ]);

            $this->mensajeExito = '¡Registro guardado con éxito!';
            $this->mensajeError = null; // Asegúrate de borrar el mensaje de error
            $this->vaciarInput();
        } catch (\Throwable $th) {
            $this->mensajeError = 'Error al guardar el registro: ' . $th->getMessage();
            $this->mensajeExito = null; // Asegúrate de borrar el mensaje de éxito

        }
    }
    public function vaciarInput()
    {
        $this->nombre = "";
        $this->direccion = "";
        $this->telefono = "";
        $this->encargado = "";
    }
}
