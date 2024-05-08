<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $fillable = [

        'solicitud_id',
        'user_id',
        'tiempoAstStart',
        'tiempoAstEnd',
        'fecha_sol',
        'fecha_gen',
        'prioridad_id',
        'tipo_ordens_id',
        'estado_ots_id',
        'tiempoEstStart',
        'tiempoEstEnd',
        'tiempoActStart',
        'tiempoActEnd',
        'notasTec',
        'diagnostico',
        'accionTomada',
        'prevencion',
        'PMNo',
        'TaskNo',
        'WoTrade',
        'LaborCost',
        'ParCost',
        'InsuCost',
        'numero_orden',
       
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }
    public function tipo_ordens(){
        return $this->belongsTo(TipoOrden::class);
    }
    public function prioridad(){
        return $this->belongsTo(Prioridad::class);
    }
    public function estado_ots(){
        return $this->belongsTo(EstadoOt::class);
    }
    public function tiempo_trabajo(){
        return $this->hasMany(TiempoTrabajo::class);
    }
    public function moviento(){
        return $this->hasMany(Movimiento::class);
    }
 }
