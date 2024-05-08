<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoTrabajo extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'orden_id',
        'tiempo_inicio',
        'tiempo_fin',

    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    }

}
