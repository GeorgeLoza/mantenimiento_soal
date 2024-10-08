<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOt extends Model
{
    use HasFactory;
    protected $fillable=[
        'codigo',
        'estado_ot',
        'descripcion',
    ];
    public function orden(){
        return $this->hasMany(Orden::class);
    }
}
