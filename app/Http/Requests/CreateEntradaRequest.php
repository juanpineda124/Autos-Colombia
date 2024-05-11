<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntradaRequest extends FormRequest
{
    /**
     * Determine si el usuario está autorizado para realizar esta solicitud.
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
        // Estas reglas se aplicarán cuando se intente validar la solicitud.
        return [
            'placa' => 'required|string|max:15',
            'nombre' => 'required|string|max:100',
            'tel' => 'required|string|max:15',
            'celda_id'=> 'required',
            'user_id'=> 'required',
        ];
    }
}
