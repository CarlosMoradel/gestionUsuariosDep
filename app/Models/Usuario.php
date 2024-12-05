<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;  // Importa el trait SoftDeletes

class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes; // Agregar SoftDeletes al modelo

    protected $fillable = ['nombre', 'correo', 'telefono', 'direccion', 'contraseña', 'departamento_id'];

    protected $hidden = ['contraseña'];

    // Esto permite que el modelo reconozca el campo deleted_at como una fecha
    protected $dates = ['deleted_at'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}
