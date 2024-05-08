<?php

namespace App\Livewire\Compra;

use App\Models\Movimiento;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    //filtros
    public $f_fecha;
    public $f_repuesto;
    public $f_factura;
    public $f_almacen;
    public $f_proveedor;

    public $aplicandoFiltros = false;
    //filtros-ordenamiento
    public $sortField;
    public $sortAsc = true;

    //mostrar filtro
    public $filtro = false;


    public function mount()
    {
        $this->sortField = "created_at";
        $this->sortAsc = false;
    }
    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }
    #[On('actualizar_tabla_movimientos')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Movimiento::query()->where('movimiento','compra')
            ->when($this->f_fecha, function ($query) {
                return $query->where('fecha', 'like', '%' . $this->f_fecha . '%');
            })

            ->when($this->f_factura, function ($query) {
                return $query->where('factura', 'like', '%' . $this->f_factura . '%');
            })

            ->when($this->f_almacen, function ($query) {
                return $query->whereHas('almacen', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_almacen . '%');
                });
            })

            ->when($this->f_repuesto, function ($query) {
                return $query->whereHas('repuestos', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_repuesto . '%');
                });
            })

            ->when($this->f_proveedor, function ($query) {
                return $query->whereHas('proveedor', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_proveedor . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : "desc");
            });
        // Decide si usar paginación o mostrar todos los resultados
        $movimientos = $this->aplicandoFiltros ? $query->get() : $query->paginate(20);
        return view('livewire.compra.tabla',[
            'movimientos' => $movimientos
        ]);
    }
    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_fecha', 'f_repuesto', 'f_proveedor', 'f_factura']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_fecha || $this->f_repuesto || $this->f_proveedor || $this->f_factura;
    }
}
