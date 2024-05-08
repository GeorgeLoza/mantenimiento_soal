<?php

namespace App\Livewire\Compra;

use App\Models\Almacen;
use App\Models\Movimiento;
use App\Models\Proveedor;
use App\Models\Repuesto;
use Livewire\Component;

class Crear extends Component
{
    public $repuestos_search = null;
    public $repuesto_id;
    public $cantidad;
    public $precio;
    public $almacen_id;
    public $observaciones;
    public $proveedor_id;
    public $factura;

    public $proveedores;
    public $almacenes;
    public $repuestos;
    public $posibles;

    public function mount()
    {
        $this->proveedores = Proveedor::all();
        $this->almacenes = Almacen::all();
        $this->posibles = Movimiento::where('fecha', NULL)->where('movimiento','compra')->get();
    }

    public function render()
    {
        $this->repuestos = Repuesto::where('nombre', 'like', '%' . $this->repuestos_search . '%')->get();
        return view('livewire.compra.crear');
    }
    public function save()
    {
        $this->validate([
            'factura' => 'required',
            'proveedor_id' => 'required',
            'almacen_id' => 'required',
        ]);

        
        try {

            $movimientosVacios = Movimiento::whereNull('fecha')->where('movimiento','compra')->get();


            foreach($movimientosVacios as $mov){
                $mov->fecha =  now();
                $mov->tipo =  'ingreso';
                $mov->movimiento =  'compra';
                $mov->factura =  $this->factura;
                $mov->proveedor_id =  $this->proveedor_id;
                $mov->almacen_id =  $this->almacen_id;                
                $mov->save();
                
            }

            $this->dispatch('actualizar_tabla_movimientos');
            $this->dispatch('success', mensaje: 'Compra registrada exitosamente');
            $this->posibles = Movimiento::where('fecha', null)->get();
            // Limpiar los campos después de agregar un elemento
            $this->factura = null;
            $this->proveedor_id = null;
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
            'precio' => 'required',
        ]);
        try {

            Movimiento::create([
                'repuestos_id' => $this->repuesto_id,
                'cantidad' => $this->cantidad,
                'precio' => $this->precio,
                'movimiento' => 'compra',
            ]);
            $repuesto = Repuesto::find($this->repuesto_id);
            
            $repuesto->precioRelativo =$this->precio;
            $repuesto->save();

            // Limpiar los campos después de agregar un elemento
            $this->repuesto_id = null;
            $this->cantidad = null;
            $this->precio = null;

            

            
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
