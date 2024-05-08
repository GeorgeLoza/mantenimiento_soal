<?php

namespace App\Livewire\Catalogo;

use App\Models\Departamentos;
use Livewire\Component;


class DepartamentoCrud extends Component
{
    public $codigo, $departamento, $descripcion;

    public $mensajeExito;
    public $mensajeError;

    public function render()
    {
        $departamentos = Departamentos::all();
        return view('livewire.catalogo.departamento-crud', compact('departamentos'));
    }

    public function save()
    {

        $this->validate([
            
        'codigo' => 'required',
        'departamento' => 'required',
        'descripcion' => 'required',
       
       
        ]);

        try{
            Departamentos::create([

                'codigo' => $this->codigo,
                'departamento' => $this->departamento,
                'descripcion' => $this->descripcion,
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
        $this->codigo = "";
        $this->departamento = "";
        $this->descripcion = "";
    }
}


