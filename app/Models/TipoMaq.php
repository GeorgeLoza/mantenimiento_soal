<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaq extends Model
{
    use HasFactory;
    protected $fillable = [
        //tipo maquina
        'codigo',
        'nombre',
        'descripcion',
    ];
    public function maquina(){
        return $this->hasMany(Maquina::class); 
    }
}
