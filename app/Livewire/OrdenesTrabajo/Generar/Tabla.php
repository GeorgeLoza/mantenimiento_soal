<?php

namespace App\Livewire\OrdenesTrabajo\Generar;

use App\Models\Movimiento;
use App\Models\Orden;
use App\Models\TiempoTrabajo;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;

class Tabla extends Component
{
    use WithPagination;

    //filtros-busqueda
    public $f_fecha_sol = null;
    public $f_user_sol = null;
    public $f_descripcion = null;
    public $f_maquina = null;
    public $f_ubicacion = null;
    public $f_estado = null;
    public $f_user_asi = null;
    public $f_tipo = null;
    public $f_prioridad = null;
    public $f_numeroOt = null;

    public $aplicandoFiltros = false;

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

    public function mount()
    {
        $this->sortField = "created_at";
        $this->sortAsc = false;
    }

    #[On('actualizar_tabla_generar_ordenes')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();
        $query = Orden::query()
            ->when($this->f_fecha_sol, function ($query) {
                return $query->whereHas('solicitud', function ($query) {
                    $query->where('fecha_sol', 'like', '%' . $this->f_fecha_sol . '%');
                });
            })
            ->when($this->f_numeroOt, function ($query) {
                return $query->where('numero_orden', 'like', '%' . $this->f_numeroOt . '%');
            })
            ->when($this->f_user_sol, function ($query) {
                return $query->whereHas('solicitud', function ($query) {
                    $query->where('user_id', 'like', '%' . $this->f_user_sol . '%');
                });
            })

            ->when($this->f_descripcion, function ($query) {
                return $query->whereHas('solicitud', function ($query) {
                    $query->where('descripcion', 'like', '%' . $this->f_descripcion . '%');
                });
            })

            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : "desc");
            });
        // Decide si usar paginación o mostrar todos los resultados
        $ordenes = $this->aplicandoFiltros ? $query->get() : $query->paginate(50);
        return view('livewire.ordenes-trabajo.generar.tabla', [
            'ordenes' => $ordenes
        ]);
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        // Resto de la lógica para aplicar los filtros
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_fecha_sol', 'f_user_sol', 'f_descripcion', 'f_maquina', 'f_ubicacion', 'f_estado', 'f_user_asi', 'f_tipo', 'f_prioridad']);

        // Refresca el componente
        $this->js('window.location.reload()');
    }
    private function hayFiltrosActivos(): bool
    {
        return $this->f_fecha_sol || $this->f_user_sol || $this->f_descripcion || $this->f_maquina || $this->f_ubicacion || $this->f_estado || $this->f_user_asi || $this->f_tipo || $this->f_prioridad;
    }

    public function imprimir($id)
{
    return response()->streamDownload(
        function () use ($id) {

            $data = Orden::findOrFail($id);
            $tiempos = TiempoTrabajo::where('orden_id',$id)->get();
            $items = Movimiento::where('orden_id',$id)->where('estado','Entregado')->get();

            $pdf = \PDF::loadView('pdf.reporte.ot', compact(['data','tiempos','items']));
            $pdf->setPaper('letter', 'portrait');
            echo $pdf->stream();
        },
        'text.pdf'
    );
}

}
