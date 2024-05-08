<?php

namespace App\Livewire\RepOrdenes;

use Livewire\Component;
use App\Models\Movimiento;
use App\Models\Repuesto;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    //filtros
    public $f_fecha;
    public $f_repuesto;
    public $f_orden;
    public $f_almacen;
    public $f_estado;

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
        $query = Movimiento::query()->where('movimiento','ot')

            ->when($this->f_estado, function ($query) {
                return $query->where('estado', 'like', '%' . $this->f_estado . '%');
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

            ->when($this->f_orden, function ($query) {
                return $query->whereHas('orden', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_orden . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : "desc");
            });
        // Decide si usar paginación o mostrar todos los resultados
        $movimientos = $this->aplicandoFiltros ? $query->get() : $query->paginate(20);
        return view('livewire.rep-ordenes.tabla',[
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
        $this->reset(['f_fecha', 'f_repuesto', 'f_orden', 'f_almacen','f_estado']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_fecha || $this->f_repuesto || $this->f_orden || $this->f_almacen || $this->f_estado;
    }

    public function almacen1($id){
        $registro = Movimiento::find($id);
        $repuesto = Repuesto::where('id', $registro->repuestos_id)->first();
        $registro->fecha = now();
        $registro->tipo = 'salida';
        $registro->almacen_id = '1';
        $registro->estado = 'Entregado';
        $registro->precio = $repuesto->precioRelativo;
        $registro->save();
    }
    public function almacen2($id){
        $registro = Movimiento::find($id);
        $repuesto = Repuesto::where('id', $registro->repuestos_id)->first();
        $registro->fecha = now();
        $registro->tipo = 'salida';
        $registro->almacen_id = '2';
        $registro->estado = 'Entregado';
        $registro->precio = $repuesto->precioRelativo;
        $registro->save();
    }
    public function esperar($id){
        $registro = Movimiento::find($id);
        $registro->estado = 'Repuesto pendiente';
        $registro->save();
    }

    
}
