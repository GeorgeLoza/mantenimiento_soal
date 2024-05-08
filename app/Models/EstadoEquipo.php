<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoEquipo extends Model
{
    use HasFactory;
protected $fillable = [


    'codigo',
    'estado',
    'descripcion',

];

}
