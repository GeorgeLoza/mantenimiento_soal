<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;
    protected $fillable = [

        //Prioridad
        'codigo',
        'prioridad',
        'descripcion',

    ];
    public function orden(){
        return $this->hasMany(Orden::class);
    }
}
