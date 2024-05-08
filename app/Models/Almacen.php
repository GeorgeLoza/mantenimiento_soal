<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'lugar',
        'user_id',
        'planta_id',
    ];

    public function moviento(){
        return $this->hasMany(Movimiento::class);
    }

}
