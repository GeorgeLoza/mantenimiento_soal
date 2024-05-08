<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $fillable = [

        'fecha',
        'tipo',
        'movimiento',
        'repuestos_id',
        'cantidad',
        'precio',
        'almacen_id',
        'observaciones',
        'proveedor_id',
        'factura',
        'orden_id',
        'estado',
    ];

    public function repuestos(){
        return $this->belongsTo(Repuesto::class);
    }
    public function almacen(){
        return $this->belongsTo(Almacen::class);
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    public function orden(){
        return $this->belongsTo(Orden::class);
    }
}
