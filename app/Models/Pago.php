<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */

    protected $fillable = ['salida_id', 'tiempo_estacionado', 'monto_pagado'];

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }
}

