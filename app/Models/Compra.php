<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [

        'repuestos_id',
        'tipo',
        'movimiento',
        'fecha',
        'cantidad',
        'almacen_origen_id',
        'almacen_destino_id',
        'orden_id',
        'factura',
        'descripcion',
        
    ];



}
