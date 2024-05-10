<?php

namespace App\Livewire\Repuesto;

use Livewire\Component;
use App\Models\Repuesto;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Tabla extends Component
{
    use WithPagination;
    //filtros-busqueda
    public $f_numero = null;
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_descripcion = null;
    public $f_estado = null;
    public $f_ubicacionActual = null;

    public $aplicandoFiltros = false;
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
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
       
        $query = Repuesto::query()
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
            });

            // Decide si usar paginación o mostrar todos los resultados
        $repuestos = $this->aplicandoFiltros ? $query->get() : $query->paginate(5);


        return view('livewire.repuesto.tabla', [
            'repuestos' => $repuestos
        ]);
    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_numero', 'f_codigo', 'f_nombre', 'f_descripcion','f_estado','f_ubicacionActual']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_numero || $this->f_codigo || $this->f_nombre || $this->f_descripcion || $this->f_estado || $this->f_ubicacionActual;
    }

}
