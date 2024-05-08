<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;
    protected $fillable = [

        'codigo',
        'nombre',
        'serie',
        'fechacom',
        'modelo',
        'estado',
        'costo',
        'fabricante',
        'criticidad',
        'ubicacion_id',
        'tipo_maqs_id',
        'estado_equipos_id',
        
    ];

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class); 
    }
    public function solicitud(){
        return $this->hasMany(Solicitud::class); 
    }

    public function tipomaq(){
        return $this->belongsTo(TipoMaq::class); 
    }

    public function estadomaq(){
        return $this->belongsTo(EstadoEquipo::class); 
    }

}
