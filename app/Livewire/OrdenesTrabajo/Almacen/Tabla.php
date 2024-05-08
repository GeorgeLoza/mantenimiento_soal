<?php

namespace App\Livewire\OrdenesTrabajo\Almacen;

use App\Models\Repuesto;
use Livewire\Component;

class Tabla extends Component
{

    public $f_nombre=null;
    public $f_descripcion=null;
    public $f_estado=null;
    public $f_stockact=null;
    public $f_stockmin=null;

    
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;
    
    //mostrar filtro
    public $filtro=false;
    
    public function show_filtro(){
        $this->filtro =!$this->filtro;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function mount(){
        $this->sortField = "created_at";
        $this->sortAsc = false;
    }

    // #[On('actualizar_tabla_almacen_repuesto')]
    // public function render()
    // {
    //     $repuestos = Repuesto::query()

    //         ->when($this->f_fecha, function ($query) {
    //             return $query->where('fecha_sol', 'like', '%' . $this->f_fecha . '%');
    //         })

    //         ->when($this->f_descripcion, function ($query) {
    //             return $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
    //         })

    //         ->when($this->f_maquina, function ($query) {
    //             return $query->whereHas('maquina', function ($query) {
    //                 $query->where('codigo', 'like', '%' . $this->f_maquina . '%');
    //             });
    //         })

    //         ->when($this->f_ubicacion, function ($query) {
    //             return $query->whereHas('ubicacion', function ($query) {
    //                 $query->where('codigo', 'like', '%' . $this->f_ubicacion . '%');
    //             });
    //         })

    //         ->when($this->f_estado, function ($query) {
    //             return $query->where('estado', 'like', '%' . $this->f_estado . '%');
    //         })

    //         ->when($this->sortField, function ($query){
    //             $query->orderBy($this->sortField,$this->sortAsc ? 'asc' : "desc");
    //         })

    //         ->get();


    //     return view('livewire.ordenes-trabajo.almacen.tabla', [
    //         'repuestos' => $repuestos
    //     ]);
    // }
   

}
