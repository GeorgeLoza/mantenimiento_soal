<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'departamento',
        'rol',
        'cargo',
        'codigo',
        'password',
        'tipo_oficios_id',
        'plantas_id',
    ];

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }

    public function oficio()
{
    return $this->belongsTo(TipoOficio::class, 'tipo_oficios_id');
}

public function planta()
{
    return $this->belongsTo(Planta::class, 'plantas_id');
}


    public function orden()
    {
        return $this->hasMany(Orden::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
