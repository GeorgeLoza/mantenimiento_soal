<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOrden extends Model
{
    use HasFactory;
    protected $fillable = [
        
        //tipo del orden
        'codigo',
        'tipo_orden',
        'descripcion',
    ];

    public function orden(){
        return $this->hasMany(Orden::class);
    }
}
