<?php

namespace App\Livewire\Repuesto;

use App\Models\Repuesto;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $id;
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


    public function mount(){

        $repuesto = Repuesto::where('id', $this->id)->first();

        $this->numero = $repuesto->numero;
        $this->codigo = $repuesto->codigo;
        $this->nombre = $repuesto->nombre;
        $this->foto = $repuesto->foto;
        $this->descripcion = $repuesto->descripcion;
        $this->estado = $repuesto->estado;
        $this->ubicacionActual = $repuesto->ubicacionActual;
        $this->stockActual = $repuesto->stockActual;
        $this->stockMinimo = $repuesto->stockMinimo;
        $this->medida = $repuesto->medida;
        $this->unidad = $repuesto->unidad;
        $this->precioRelativo = $repuesto->precioRelativo;

    }
    public function render()
    {
        return view('livewire.repuesto.editar');
    }
    public function update(){

        

        try {
            
            $repuesto = Repuesto::find($this->id);
            $repuesto->numero = $this->numero;
            $repuesto->codigo = $this->codigo;
            $repuesto->nombre = $this->nombre;
            $repuesto->foto = $this->foto;
            $repuesto->descripcion = $this->descripcion;
            $repuesto->estado = $this->estado;
            $repuesto->ubicacionActual = $this->ubicacionActual;
            $repuesto->stockActual = $this->stockActual;
            $repuesto->stockMinimo = $this->stockMinimo;
            $repuesto->medida = $this->medida;
            $repuesto->unidad = $this->unidad;
            $repuesto->precioRelativo = $this->precioRelativo;
            $repuesto->save();
            

            $this->dispatch('actualizar_tabla_repuestos');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Repuesto actualizado exitosamente');
            
        } catch (\Throwable $th) {

            dd($th);
            $this->closeModal();
            $this->dispatch('error', mensaje: 'Error'. $th);
        }
    }

}
