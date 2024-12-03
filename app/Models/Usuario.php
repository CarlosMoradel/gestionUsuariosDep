<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $fillable = ['nombre', 'correo', 'telefono', 'direccion', 'contraseña', 'departamento_id'];

    protected $hidden = ['contraseña'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}