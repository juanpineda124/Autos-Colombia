<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = ['entrada_id'];

    /**
     * Define la relación inversa entre Salida y Entrada.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entrada()
    {
        // Esta función define una relación de pertenencia (belongsTo) entre la salida y la entrada.
        // Indica que una salida pertenece a una entrada en particular.
        return $this->belongsTo(Entrada::class);
    }
}
