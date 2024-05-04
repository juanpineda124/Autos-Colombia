<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSalidaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        // En este caso, se permite que cualquier usuario realice esta solicitud,
        // ya que el método devuelve 'true'.
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Define las reglas de validación para los campos del formulario.
        // En este caso, se requiere que el campo 'entrada_id' esté presente en la solicitud.
        return [
            'entrada_id'=> 'required'
        ];
    }
}
