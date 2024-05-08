<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $fillable = [

        //Prioridad
        'codigo',
        'nombre',
        'descripcion',

    ];

    public function usuario()
    {
      return $this->hasMany(User::class);
    }
    
}

