<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    protected $fillable =[

        'numero',
        'codigo',
        'nombre',
        'descripcion',
        'estado',
        'ubicacionActual',
        'stockActual',
        'stockMinimo',
        'medida',
        'unidad',
        'precioRelativo'

    ];

    public function moviento(){
        return $this->hasMany(Movimiento::class);
    }

}
