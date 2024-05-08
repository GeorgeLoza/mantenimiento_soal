<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'fecha_sol',
        'maquina_id',
        'ubicacion_id',
        'descripcion',
        'estado',
       
    ];

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }

    public function maquina(){
        return $this->belongsTo(Maquina::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orden(){
        return $this->hasOne(Orden::class);
    }
}
