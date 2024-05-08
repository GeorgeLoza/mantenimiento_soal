<?php

namespace App\Livewire\Repuesto;

use App\Models\Repuesto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    //inputs
    public $numero;
    public $codigo;
    public $nombre;
    public $foto;
    public $descripcion;
    public $estado;
    public $ubicacionActual;
    public $stockActual;
    public $stockMinimo;
    public $medida;
    public $unidad;
    public $precioRelativo;

    public function render()
    {
        return view('livewire.repuesto.crear');
    }
    public function save()
    {

        $this->validate([
            'numero' => 'required',
            'nombre' => 'required',       
            
        ]);
        
        try {
            
            Repuesto::create([
                'numero' => $this->numero,
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado,
                'ubicacionActual' => $this->ubicacionActual,
                'stockActual' => $this->stockActual,
                'stockMinimo' => $this->stockMinimo,
                'medida' => $this->medida,
                'unidad' => $this->unidad,
                'precioRelativo' => $this->precioRelativo,
            ]);

            $this->dispatch('actualizar_tabla_repuestos');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Registro agregado exitosamente');
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
}
