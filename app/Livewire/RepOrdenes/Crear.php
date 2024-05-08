<?php

namespace App\Livewire\RepOrdenes;

use App\Models\Almacen;
use Livewire\Component;
use App\Models\Repuesto;
use App\Models\Movimiento;
use App\Models\Orden;

class Crear extends Component
{
    public $repuestos_search = null;
    public $repuesto_id;
    public $cantidad;    
    public $almacen_id;
    public $observaciones;
    public $orden_id;

    public $ordenes;
    public $almacenes;
    public $repuestos;
    public $posibles;

    public function mount()
    {
        $this->almacenes = Almacen::all();
        $this->ordenes = Orden::whereHas('solicitud', function($query){
            $query->where('estado','en ejecucion');
        })->get();      
        $this->posibles = Movimiento::where('fecha', NULL)->where('movimiento','ot')->get();
    }

    public function render()
    {
        $this->repuestos = Repuesto::where('nombre', 'like', '%' . $this->repuestos_search . '%')->get();
        return view('livewire.rep-ordenes.crear');
    }
    public function save()
    {
        dd($this->orden_id);
        $this->validate([
            'orden_id' => 'required',
            'almacen_id' => 'required',
        ]);

        
        try {

            $movimientosVacios = Movimiento::whereNull('fecha')->where('movimiento','ot')->get();


            foreach($movimientosVacios as $mov){
                $mov->fecha =  now();
                $mov->tipo =  'salida';
                $mov->movimiento =  'ot';
                $mov->orden_id =  $this->orden_id;
                $mov->almacen_id =  $this->almacen_id;                
                $mov->estado =  'Pendiente';                
                $mov->save();
                
            }

            $this->dispatch('actualizar_tabla_movimientos');
            $this->dispatch('success', mensaje: 'Compra registrada exitosamente');
            $this->posibles = Movimiento::where('fecha', null)->get();
            // Limpiar los campos después de agregar un elemento
            $this->almacen_id = null;
        } catch (\Throwable $th) {
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
    public function agregar_item()
    {

        $this->validate([
            'repuesto_id' => 'required',
            'cantidad' => 'required',
            
        ]);
        try {

            Movimiento::create([
                'repuestos_id' => $this->repuesto_id,
                'cantidad' => $this->cantidad,
                
                'movimiento' => 'ot',
            ]);
            // Limpiar los campos después de agregar un elemento
            $this->repuesto_id = null;
            $this->cantidad = null;
            $this->posibles = Movimiento::where('fecha', null)->get();
        } catch (\Throwable $th) {
            dd($th);
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
    public function eliminarRepuesto($id)
    {
        try {
            // Encuentra el repuesto posible
            $repuesto = Movimiento::findOrFail($id);

            // Elimina el repuesto posible de la base de datos
            $repuesto->delete();

            // Actualiza los datos en la tabla
            $this->posibles = Movimiento::where('fecha', null)->get();
        } catch (\Throwable $th) {
            dd($th);
            $this->dispatch('error', mensaje: 'Error' . $th);
        }
    }
    
}
