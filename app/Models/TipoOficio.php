<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOficio extends Model
{
  use HasFactory;
  protected $fillable = [
    //Oficio
    'codigo',
    'oficio',
    'descripcion',
  ];

  public function user()
  {
    return $this->hasMany(User::class);
  }
}
