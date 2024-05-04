<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Muestra una lista de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene todos los usuarios
        $empleados = User::all();

        // Retorna la vista 'users.index' con la lista de empleados
        return view('users.index', ['users' => $empleados]);
    }
}