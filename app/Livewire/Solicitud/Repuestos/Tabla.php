<?php

namespace App\Livewire\Solicitud\Repuestos;

use Livewire\Component;
use App\Models\Movimiento;
use App\Models\Repuesto;
use Livewire\Attributes\On;

class Tabla extends Component
{
    //filtros-busqueda
    public $f_fecha = null;
    public $f_ot = null;
    public $f_ubicacion = null;
    public $f_maquina = null;
    public $f_problema = null;
    public $f_rep = null;
    public $f_estado = null;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;

    //mostrar filtro
    public $filtro = false;

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
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

    #[On('actualizar_tabla_repuestosSolicitud')]
    public function render()
    {
        $solicitudes = Movimiento::query()
        ->whereNot('estado',NULL)
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_fecha, function ($query) {
                return $query->where('fecha', 'like', '%' . $this->f_fecha . '%');
            })
            ->when($this->f_ot, function ($query) {
                return $query->whereHas('orden', function ($query) {
                    $query->where('numero_orden', 'like', '%' . $this->f_ot . '%');
                });
            })
            ->when($this->f_ubicacion, function ($query) {
                return $query->whereHas('orden.solicitud.ubicacion', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_ubicacion . '%');
                });
            })
            ->when($this->f_maquina, function ($query) {
                return $query->whereHas('orden.solicitud.maquina', function ($query) {
                    $query->where('codigo', 'like', '%' . $this->f_maquina . '%');
                });
            })
            ->when($this->f_rep, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_rep . '%');
            })

            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : "desc");
            })

            ->get();


        return view('livewire.solicitud.repuestos.tabla', [
            'solicitudes' => $solicitudes
        ]);
    }

    public function aprobar($id){
        $registro = Movimiento::find($id);
        
        $registro->estado = 'Aprobado';
        $registro->save();

    }
    public function rechazar($id){
        $registro = Movimiento::find($id);
        $registro->estado = 'Rechazado';
        $registro->save();
    }
    public function esperar($id){
        $registro = Movimiento::find($id);
        $registro->estado = 'Repuesto pendiente';
        $registro->save();
    }
}
