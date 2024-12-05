<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importa el trait

class Departamento extends Model
{
    use HasFactory, SoftDeletes; // Usa SoftDeletes para habilitar la eliminación suave

    protected $fillable = ['nombre', 'descripcion'];

    // Si hay relaciones con otros modelos, puedes definirlas aquí.
    // Por ejemplo, si un departamento tiene muchos usuarios:
    public function usuarios()
    {
        return $this->hasMany(Usuario::class); // Relación de uno a muchos con el modelo Usuario
    }
}
