<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $fillable =[

        'codigo',
        'nombre',
        'planta',

    ];
    public function solicitud(){
        return $this->hasMany(Solicitud::class); 
    }
    public function maquina(){

        return $this->hasMany(Maquina::class);

    }
}
