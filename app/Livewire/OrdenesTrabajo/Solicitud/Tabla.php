<?php

namespace App\Livewire\OrdenesTrabajo\Solicitud;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Solicitud;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    //filtros-busqueda
    public $f_fecha = null;
    public $f_descripcion = null;
    public $f_maquina = null;
    public $f_ubicacion = null;
    public $f_solicitante = null;
    public $f_estado = null;
    
  
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


    #[On('actualizar_tabla_solicitud_ordenes')]
    public function render()
    {
        $solicitudes = Solicitud::query()

            ->when($this->f_fecha, function ($query) {
                return $query->where('fecha_sol', 'like', '%' . $this->f_fecha . '%');
            })

            ->when($this->f_descripcion, function ($query) {
                return $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
            })

            ->when($this->f_maquina, function ($query) {
                return $query->whereHas('maquina', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_maquina . '%');
                });
            })

            ->when($this->f_ubicacion, function ($query) {
                return $query->whereHas('ubicacion', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_ubicacion . '%');
                });
            })

            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })

            ->when($this->sortField, function ($query){
                $query->orderBy($this->sortField,$this->sortAsc ? 'asc' : "desc");
            })

            ->paginate(5);


        return view('livewire.ordenes-trabajo.solicitud.tabla', [
            'solicitudes' => $solicitudes
        ]);
    }

}
