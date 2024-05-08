<?php

namespace App\Livewire\Repuesto;

use Livewire\Component;
use App\Models\Repuesto;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;


class Tabla extends Component
{
    //filtros-busqueda
    public $f_numero = null;
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_descripcion = null;
    public $f_estado = null;
    public $f_ubicacionActual = null;

    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;

    //mostrar filtro
    public $filtro = false;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    #[On('actualizar_tabla_repuestos')]
    public function render()
    {

        $repuestos = Repuesto::query()
            ->select('repuestos.*', 'stocks.almacen_id', 'stocks.stock_actual')
            ->leftJoin(DB::raw('(SELECT repuestos_id, almacen_id, SUM(CASE WHEN tipo = "ingreso" THEN cantidad ELSE -cantidad END) AS stock_actual
                            FROM movimientos
                            WHERE fecha IS NOT NULL
                            GROUP BY repuestos_id, almacen_id) as stocks'), function ($join) {
                $join->on('repuestos.id', '=', 'stocks.repuestos_id');
            })
            ->when($this->f_numero, function ($query) {
                return $query->where('numero', 'like', '%' . $this->f_numero . '%');
            })
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })
            ->when($this->f_descripcion, function ($query) {
                return $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
            })
            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
            })
            ->when($this->f_ubicacionActual, function ($query) {
                return $query->where('ubicacionActual', 'like', '%' . $this->f_ubicacionActual . '%');
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : "desc");
            })

            ->get();


        return view('livewire.repuesto.tabla', [
            'repuestos' => $repuestos
        ]);
    }
}
