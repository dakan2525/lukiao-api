<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;

    // datos que puede usar para llenado masivo
    protected $fillable = [
        "nombre",
        "apellido",
        "razon_social",
        "cedula",
        "telefono",
        "pais",
        "ciudad",
    ];
}