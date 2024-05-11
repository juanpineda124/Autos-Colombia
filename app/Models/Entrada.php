<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = ['placa', 'nombre', 'tel', 'celda_id', 'user_id'];

    /**
     * Define la relación inversa entre Entrada y Celda.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function celda()
    {
        // Esta función define una relación de pertenencia (belongsTo) entre la salida y la entrada.
        // Indica que una salida pertenece a una entrada en particular.
        return $this->belongsTo(Celda::class);
    }

    /**
     * Define la relación inversa entre Entrada y Empleado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
